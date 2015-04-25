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
        $friend = $em->getRepository('LcLcBundle:Friend')->check($this->getUid()->getToken(),$token);
        $req = $em->getRepository('LcLcBundle:Friend')->check($token,$this->getUid()->getToken());
        if(!$is){
			throw $this->createNotFoundException('Unable to find Friend entity.');
		}
        if(empty($friend) && empty($req)){
			$entity->setId1($this->getUid()->getToken());
			$entity->setId2($token);
			$entity->setStatus(false);
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
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LcLcBundle:Friend')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Friend entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('LcLcBundle:Friend:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
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
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LcLcBundle:Friend')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Friend entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('friend_edit', array('id' => $id)));
        }

        return $this->render('LcLcBundle:Friend:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Friend entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('LcLcBundle:Friend')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Friend entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('friend'));
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
