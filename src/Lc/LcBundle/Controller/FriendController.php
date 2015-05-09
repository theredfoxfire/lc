<?php

namespace Lc\LcBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Lc\LcBundle\Entity\Friend;
use Lc\LcBundle\Form\FriendType;

/**
 * Friend controller.
 *
 */
class FriendController extends Controller
{

    /**
     * Lists all Friend entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('LcLcBundle:Friend')->findAll();

        return $this->render('LcLcBundle:Friend:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Friend entity.
     *
     */
    public function createAction($token = null)
    {
        $entity = new Friend();
        
        $em = $this->getDoctrine()->getManager();
        $is = $em->getRepository('LcLcBundle:User')->findOneByToken($token);
        if(!$is){
			throw $this->createNotFoundException('Unable to find Friend entity.');
		}
		
        $friend = $em->getRepository('LcLcBundle:Friend')->check($this->getUid()->getId(),$is->getId());
        $req = $em->getRepository('LcLcBundle:Friend')->check($is->getId(),$this->getUid()->getId());
        
        if(empty($friend) && empty($req)){
			$entity->setUser1($this->getUid());
			$entity->setUser2($is);
			$entity->setStatus(true);
			$entity->setIsConfirmed(false);
			$em->persist($entity);
			$em->flush();
		}else{
			return $this->redirect($this->generateUrl('profile_see', array('token' => $token)));
		}

        return $this->redirect($this->generateUrl('profile_see', array('token' => $token)));
    }

    /**
     * Creates a form to create a Friend entity.
     *
     * @param Friend $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Friend $entity)
    {
        $form = $this->createForm(new FriendType(), $entity, array(
            'action' => $this->generateUrl('friend_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Friend entity.
     *
     */
    public function newAction()
    {
        $entity = new Friend();
        $form   = $this->createCreateForm($entity);

        return $this->render('LcLcBundle:Friend:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Friend entity.
     *
     */
    public function showAction($token)
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('LcLcBundle:Friend')->freez($this->getUid()->getId());
        $others = $em->getRepository('LcLcBundle:User')->loadOthers($this->getUid()->getSex(), $this->getUid()->getId());

        return $this->render('LcLcBundle:Friend:show.html.twig', array(
            'entities'      => $entities,
            'others' => $others,
        ));
    }
    
    public function showfallAction($token)
    {
        $em = $this->getDoctrine()->getManager();
		
        $entities = $em->getRepository('LcLcBundle:Friend')->fall($this->getUid()->getId());
        $others = $em->getRepository('LcLcBundle:User')->loadOthers($this->getUid()->getSex(), $this->getUid()->getId());
        
        //exit(\Doctrine\Common\Util\Debug::dump($entities));

        return $this->render('LcLcBundle:Friend:showfall.html.twig', array(
            'entities'      => $entities,
            'others' => $others,
        ));
    }

    /**
     * Displays a form to edit an existing Friend entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LcLcBundle:Friend')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Friend entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('LcLcBundle:Friend:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Friend entity.
    *
    * @param Friend $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Friend $entity)
    {
        $form = $this->createForm(new FriendType(), $entity, array(
            'action' => $this->generateUrl('friend_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Friend entity.
     *
     */
    public function updateAction($token)
    {
        $em = $this->getDoctrine()->getManager();
        $mate = new Friend();

        $entity = $em->getRepository('LcLcBundle:Friend')->findOneByToken($token);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Friend entity.');
        }

		$entity->setIsConfirmed(true);
		$em->persist($entity);
        $em->flush();
        
        $is = $em->getRepository('LcLcBundle:User')->findOneById($entity->getUser1());
        
        $mate->setUser1($this->getUid());
		$mate->setUser2($is);
		$mate->setStatus(true);
		$mate->setIsConfirmed(true);
		$em->persist($mate);
		$em->flush();

        return $this->redirect($this->generateUrl('friend_fall', array('token' => $token)));

    }
    /**
     * Edits an existing Friend entity.
     *
     */
    public function blockAction($token)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LcLcBundle:Friend')->findOneByToken($token);
        if($this->getUid() == $entity->getUser2()){
			$mate = $em->getRepository('LcLcBundle:Friend')->findOneByUser1($entity->getUser2());
		}else{
			$mate = $em->getRepository('LcLcBundle:Friend')->findOneByUser1($entity->getUser1());
		}
		
		$em->getRepository('LcLcBundle:Chat')->deleteChat($entity->getUser1(),$entity->getUser2());

        if (empty($mate)) {
            throw $this->createNotFoundException('Unable to find Friend entity.');
        }

		$entity->setStatus(false);
		$em->persist($entity);
        $em->flush();
        
        $mate->setStatus(false);
		$em->persist($mate);
        $em->flush();

        return $this->redirect($this->generateUrl('friend_show', array('token' => $token)));

    }
    /**
     * Deletes a Friend entity.
     *
     */
    public function deleteAction($token)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('LcLcBundle:Friend')->findOneByToken($token);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Friend entity.');
        }

        $em->remove($entity);
        $em->flush();

        return $this->redirect($this->generateUrl('friend_fall',array('token' => $token)));
    }

    /**
     * Creates a form to delete a Friend entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('friend_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
    
    public function getUid(){
		$usr= $this->get('security.context')->getToken()->getUser();
		$uid = $usr->getId();
		$em = $this->getDoctrine()->getManager();
		$userId = $em->getRepository('LcLcBundle:User')->find($uid);
		return $userId;
		
	}
}
