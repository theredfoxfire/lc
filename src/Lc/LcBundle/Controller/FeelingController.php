<?php

namespace Lc\LcBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;

use Lc\LcBundle\Entity\Feeling;
use Lc\LcBundle\Entity\Fcomment;
use Lc\LcBundle\Entity\Notification;
use Lc\LcBundle\Form\FcommentType;
use Lc\LcBundle\Entity\User;
use Lc\LcBundle\Form\FeelingType;

/**
 * Feeling controller.
 *
 */
class FeelingController extends Controller
{

    /**
     * Lists all Feeling entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $paginator = $this->get('knp_paginator');
        $query = $em->getRepository('LcLcBundle:Feeling')->getUserFeeling($this->getUid());
        $pagination = $paginator->paginate(
			$query,
			$this->get('request')->query->get('page', 1),
			25
		);
        $fall = $em->getRepository('LcLcBundle:Friend')->fallCount($this->getUid()->getId());
        $chat = $em->getRepository('LcLcBundle:Chat')->unreadChatCount($this->getUid(), $this->getUid()->getId());
        $notify = $em->getRepository('LcLcBundle:Notification')->notyCount($this->getUid());
        //exit(\Doctrine\Common\Util\Debug::dump($entities));
        $others = $em->getRepository('LcLcBundle:User')->loadOthers($this->getUid()->getSex(), $this->getUid()->getId());
        $entity = new Feeling();
        $form = $this->createCreateForm($entity);
        
        $c = $em->getRepository('LcLcBundle:Feeling')->countUserFeeling($this->getUid());

        return $this->render('LcLcBundle:Feeling:index.html.twig', array(
            'entities' => $pagination,
            'others' => $others,
            'form'   => $form->createView(),
            'fall' => $fall,
            'chat' => $chat,
            'notify' => $notify,
            'c' => $c,
        ));
    }
    /**
     * Creates a new Feeling entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Feeling();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity->setIsActive(true);
            $entity->setUser($this->getUid());
            $em->persist($entity);
            $em->flush();
            
            $request->getSession()->getFlashBag()->add('notice', 
            'Status mu sudah terposting! :D');

            return $this->redirect($this->generateUrl('feeling'));
        }
        
         return $this->redirect($this->generateUrl('feeling'));
    }

    /**
     * Creates a form to create a Feeling entity.
     *
     * @param Feeling $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Feeling $entity)
    {
        $form = $this->createForm(new FeelingType(), $entity, array(
            'action' => $this->generateUrl('feeling_create'),
            'method' => 'POST',
        ));

        return $form;
    }
    
    private function createCommentForm(Fcomment $entity, $token)
    {
        $form = $this->createForm(new FcommentType(), $entity, array(
            'action' => $this->generateUrl('feeling_show', array(
				'token' => $token,)
            ),
            'method' => 'POST',
        ));

        return $form;
    }

    /**
     * Displays a form to create a new Feeling entity.
     *
     */
    public function newAction()
    {
        $entity = new Feeling();
        $form   = $this->createCreateForm($entity);

        return $this->render('LcLcBundle:Feeling:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Feeling entity.
     *
     */
    public function showAction(Request $request, $token)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LcLcBundle:Feeling')->findOneByToken($token);
        $comments = $em->getRepository('LcLcBundle:Fcomment')->getCommentList($entity);
        $fall = $em->getRepository('LcLcBundle:Friend')->fallCount($this->getUid()->getId());
        $chat = $em->getRepository('LcLcBundle:Chat')->unreadChatCount($this->getUid(), $this->getUid()->getId());
        $notify = $em->getRepository('LcLcBundle:Notification')->notyCount($this->getUid());
        $others = $em->getRepository('LcLcBundle:User')->loadOthers($this->getUid()->getSex(), $this->getUid()->getId());
        $broad = $entity->getUser()->getBroad();

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Feeling entity is this?.');
        }
        
        $fcomment = new Fcomment();
        $noty = new Notification();
        
        $form = $this->createCommentForm($fcomment, $token);
        $form->handleRequest($request);
        if ($form->isValid() && ($broad == 0)) {
			$usr= $this->get('security.context')->getToken()->getUser();
			$uid = $usr->getId();
			$em = $this->getDoctrine()->getManager();
            $fcomment->setIsPublish(true);
            $fcomment->setUser($this->getUid());
            $fcomment->setFeeling($entity);
            $em->persist($fcomment);
            $em->flush();
            
			//user 1 is commenter user 2 is commented
			$noty->setViewed(false);
			$noty->setUser1($this->getUid());
			$noty->setUser2($entity->getUser());
			$noty->setFromPage(3);
			if($this->getUid()->getId() == $entity->getUser()->getId()){
				$noty->setSelfPage($this->getUid()->getId());
			}else{
				$noty->setSelfPage(0);
			}
			$noty->setFromId($entity->getToken());
			$em->persist($noty);
			$em->flush();
			
			$request->getSession()->getFlashBag()->add('notice', 
            'Komentar mu sudah terposting! :D');
			
            return $this->redirect($this->generateUrl('feeling_show', array('token'=>$token)));
		}
        

        return $this->render('LcLcBundle:Feeling:show.html.twig', array(
            'entity'      => $entity,
            'comments' 	  => $comments,
            'others' => $others,
            'fall' => $fall,
            'chat' => $chat,
            'notify' => $notify,
            'form'		  => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Feeling entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LcLcBundle:Feeling')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Feeling entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('LcLcBundle:Feeling:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Feeling entity.
    *
    * @param Feeling $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Feeling $entity)
    {
        $form = $this->createForm(new FeelingType(), $entity, array(
            'action' => $this->generateUrl('feeling_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Feeling entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LcLcBundle:Feeling')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Feeling entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('feeling_edit', array('id' => $id)));
        }

        return $this->render('LcLcBundle:Feeling:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Feeling entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('LcLcBundle:Feeling')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Feeling entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('feeling'));
    }

    /**
     * Creates a form to delete a Feeling entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('feeling_delete', array('id' => $id)))
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
