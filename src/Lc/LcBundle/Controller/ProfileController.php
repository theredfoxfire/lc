<?php

namespace Lc\LcBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Lc\LcBundle\Entity\Profile;
use Lc\LcBundle\Entity\Notification;
use Lc\LcBundle\Entity\Usercriteria;
use Lc\LcBundle\Entity\User;
use Lc\LcBundle\Form\ProfileType;
use Lc\LcBundle\Form\DatauType;

/**
 * Profile controller.
 *
 */
class ProfileController extends Controller
{

    /**
     * Lists all Profile entities.
     *
     */
    public function indexAction()
    {
		$em = $this->getDoctrine()->getManager();
		
        $entity = $this->getUid();
        $form = $this->createDuForm($entity);
        $others = $em->getRepository('LcLcBundle:User')->loadOthers($this->getUid()->getSex(), $this->getUid()->getId());

        return $this->render('LcLcBundle:Profile:index.html.twig', array(
            'entity' => $entity,
            'others' => $others,
            'form' => $form->createView(),
        ));
    }
    
    
    public function profileAction()
    {
        $em = $this->getDoctrine()->getManager();
        
        $others = $em->getRepository('LcLcBundle:User')->loadOthers($this->getUid()->getSex(), $this->getUid()->getId());
        $entity = $em->getRepository('LcLcBundle:Profile')->findOneByUser($this->getUid());
        
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Profile entity.');
        }
        
        $form = $this->createEditForm($entity);

        return $this->render('LcLcBundle:Profile:profile.html.twig', array(
            'entity' => $entity,
            'others' => $others,
            'form' => $form->createView(),
        ));
    }
    
    /**
     * Creates a new Profile entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Profile();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('profile_show', array('id' => $entity->getId())));
        }

        return $this->render('LcLcBundle:Profile:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Profile entity.
     *
     * @param Profile $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Profile $entity)
    {
        $form = $this->createForm(new ProfileType(), $entity, array(
            'action' => $this->generateUrl('profile_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Profile entity.
     *
     */
    public function newAction()
    {
        $entity = new Profile();
        $form   = $this->createCreateForm($entity);

        return $this->render('LcLcBundle:Profile:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Profile entity.
     *
     */
    public function showAction()
    {

        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LcLcBundle:Profile')->findOneByUser($this->getUid());
        $others = $em->getRepository('LcLcBundle:User')->loadOthers($this->getUid()->getSex(), $this->getUid()->getId());

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Profile entity.');
        }

        return $this->render('LcLcBundle:Profile:show.html.twig', array(
            'entity'      => $entity,
            'others' => $others,
        ));
    }
    
    public function seeAction($token)
    {

        $em = $this->getDoctrine()->getManager();
        $noty = new Notification();
        
		$user = $em->getRepository('LcLcBundle:User')->findOneByToken($token);
		if (!$user) {
            throw $this->createNotFoundException('Unable to find Profile entity.');
        }
        
        $entity = $em->getRepository('LcLcBundle:Profile')->findOneByUser($user);
        
        $others = $em->getRepository('LcLcBundle:User')->loadOthers($this->getUid()->getSex(), $this->getUid()->getId());
        $friend = $em->getRepository('LcLcBundle:Friend')->check($this->getUid()->getId(),$user->getId());
        
        //1 -> profile, 2 -> like, 3 -> comment
        //user 1 is visiting user 2 is visited
        $noty->setViewed(false);
        $noty->setUser1($this->getUid());
        $noty->setUser2($user);
        $noty->setFromPage(1);
        $em->persist($noty);
        $em->flush();
        
        //exit(\Doctrine\Common\Util\Debug::dump($friend));

        return $this->render('LcLcBundle:Profile:see.html.twig', array(
            'entity'      => $entity,
            'others' => $others,
            'friend' => $friend,
        ));
    }

    /**
     * Displays a form to edit an existing Profile entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LcLcBundle:Profile')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Profile entity.');
        }

        $editForm = $this->createEditForm($entity);

        return $this->render('LcLcBundle:Profile:edit.html.twig', array(
            'entity'      => $entity,
            'form'   => $editForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Profile entity.
    *
    * @param Profile $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Profile $entity)
    {
        $form = $this->createForm(new ProfileType(), $entity, array(
            'action' => $this->generateUrl('profile_update', array('id' => $entity->getToken())),
            'method' => 'PUT',
            'attr' => array('class' => 'form-horizontal'),
        ));

        return $form;
    }
    /**
     * Edits an existing Profile entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LcLcBundle:Profile')->findOneByToken($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Profile entity.');
        }

        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('profile_data'));
        }

        return $this->render('LcLcBundle:Profile:profile.html.twig', array(
            'entity'      => $entity,
            'form'   => $editForm->createView(),
        ));
    }
    /**
     * Deletes a Profile entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('LcLcBundle:Profile')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Profile entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('profile'));
    }

    /**
     * Creates a form to delete a Profile entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('profile_delete', array('id' => $id)))
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
	
	private function createDuForm(User $entity)
    {
        $form = $this->createForm(new DatauType(), $entity, array(
            'action' => $this->generateUrl('user_update', array('token' => $entity->getToken())),
            'method' => 'POST',
            'attr' => array('class' => 'form-horizontal'),
        ));  
        return $form;
    }
}
