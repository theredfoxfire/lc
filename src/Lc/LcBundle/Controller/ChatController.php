<?php

namespace Lc\LcBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Lc\LcBundle\Entity\Chat;
use Lc\LcBundle\Form\ChatType;

/**
 * Chat controller.
 *
 */
class ChatController extends Controller
{

    /**
     * Lists all Chat entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $paginator = $this->get('knp_paginator');
        $query = $em->getRepository('LcLcBundle:Chat')->loadChat($this->getUid(), $this->getUid()->getId());
        $pagination = $paginator->paginate(
			$query,
			$this->get('request')->query->get('page', 1),
			25
		);
		$c = $em->getRepository('LcLcBundle:chat')->loadChatCount($this->getUid(), $this->getUid()->getId());
        
        $fall = $em->getRepository('LcLcBundle:Friend')->fallCount($this->getUid()->getId());
        $chat = $em->getRepository('LcLcBundle:Chat')->unreadChatCount($this->getUid(), $this->getUid()->getId());
        $notify = $em->getRepository('LcLcBundle:Notification')->notyCount($this->getUid());
        $others = $em->getRepository('LcLcBundle:User')->loadOthers($this->getUid()->getSex(), $this->getUid()->getId());

        return $this->render('LcLcBundle:Chat:index.html.twig', array(
            'entities' => $pagination,
            'c' => $c,
            'others' => $others,
            'fall' => $fall,
            'chat' => $chat,
            'notify' => $notify,
        ));
    }
    
    public function unreadAction()
    {
        $em = $this->getDoctrine()->getManager();

        $paginator = $this->get('knp_paginator');
        $query = $em->getRepository('LcLcBundle:Chat')->unreadChat($this->getUid(), $this->getUid()->getId());
        $pagination = $paginator->paginate(
			$query,
			$this->get('request')->query->get('page', 1),
			25
		);
		$c = $em->getRepository('LcLcBundle:chat')->unreadChatCount($this->getUid(), $this->getUid()->getId());
		
        $fall = $em->getRepository('LcLcBundle:Friend')->fallCount($this->getUid()->getId());
        $chat = $em->getRepository('LcLcBundle:Chat')->unreadChatCount($this->getUid(), $this->getUid()->getId());
        $notify = $em->getRepository('LcLcBundle:Notification')->notyCount($this->getUid());
        $others = $em->getRepository('LcLcBundle:User')->loadOthers($this->getUid()->getSex(), $this->getUid()->getId());

        return $this->render('LcLcBundle:Chat:unread.html.twig', array(
            'entities' => $pagination,
            'c' => $c,
            'others' => $others,
            'fall' => $fall,
            'chat' => $chat,
            'notify' => $notify,
        ));
    }
    /**
     * Creates a new Chat entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Chat();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('chat_show', array('id' => $entity->getId())));
        }

        return $this->render('LcLcBundle:Chat:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Chat entity.
     *
     * @param Chat $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Chat $entity, $token)
    {
        $form = $this->createForm(new ChatType(), $entity, array(
            'action' => $this->generateUrl('chat_show', array(
				'token' => $token,)
            ),
            'method' => 'POST',
        ));

        return $form;
    }

    /**
     * Displays a form to create a new Chat entity.
     *
     */
    public function newAction()
    {
        $entity = new Chat();
        $form   = $this->createCreateForm($entity);

        return $this->render('LcLcBundle:Chat:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Chat entity.
     *
     */
    public function showAction(Request $request, $token)
    {
        $em = $this->getDoctrine()->getManager();
        
        $chit = new Chat();
        $chot = new Chat();
        $form   = $this->createCreateForm($chot, $token);

        $friend = $em->getRepository('LcLcBundle:User')->findOneByToken($token);
        $em->getRepository('LcLcBundle:Chat')->updateChat($this->getUid()->getId(),$friend->getId());
        
        $entities = $em->getRepository('LcLcBundle:Chat')->chat($this->getUid()->getId(),$friend->getId());
        $fall = $em->getRepository('LcLcBundle:Friend')->fallCount($this->getUid()->getId());
        $chat = $em->getRepository('LcLcBundle:Chat')->unreadChatCount($this->getUid(), $this->getUid()->getId());
        $notify = $em->getRepository('LcLcBundle:Notification')->notyCount($this->getUid());
        
        $others = $em->getRepository('LcLcBundle:User')->loadOthers($this->getUid()->getSex(), $this->getUid()->getId());
        
        $form->handleRequest($request);
        if ($form->isValid()) {
			$formData = $request->get('lc_lcbundle_chat');
            $chot->setUser1($this->getUid());
            $chot->setUser2($friend);
            $chot->setIsRead(false);
            $chot->setIsDelete(false);
            $chot->setSenderId($this->getUid()->getId());
            $em->persist($chot);
            $em->flush();
            
            $chit->setUser2($this->getUid());
            $chit->setUser1($friend);
            $chit->setMessage($formData['message']);
            $chit->setSenderId($this->getUid()->getId());
            $chit->setIsRead(false);
            $chit->setIsDelete(false);
            $em->persist($chit);
            $em->flush();
            return $this->redirect($this->generateUrl('chat_show', array('token'=>$token)));
		}

        return $this->render('LcLcBundle:Chat:chatting.html.twig', array(
            'entities' => $entities,
            'friend' => $friend,
            'others' => $others,
            'form' => $form->createView(),
            'fall' => $fall,
            'chat' => $chat,
            'notify' => $notify,
        ));
    }

    /**
     * Displays a form to edit an existing Chat entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LcLcBundle:Chat')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Chat entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('LcLcBundle:Chat:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Chat entity.
    *
    * @param Chat $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Chat $entity)
    {
        $form = $this->createForm(new ChatType(), $entity, array(
            'action' => $this->generateUrl('chat_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Chat entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LcLcBundle:Chat')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Chat entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('chat_edit', array('id' => $id)));
        }

        return $this->render('LcLcBundle:Chat:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Chat entity.
     *
     */
    public function deleteAction($token)
    {

        $em = $this->getDoctrine()->getManager();
        $friend = $em->getRepository('LcLcBundle:User')->findOneByToken($token);
        $entity = $em->getRepository('LcLcBundle:Chat')->deleteChat($this->getUid()->getId(),$friend->getId());

        if (!$friend) {
            throw $this->createNotFoundException('Unable to find Chat entity.');
        }

        return $this->redirect($this->generateUrl('chat'));
    }

    /**
     * Creates a form to delete a Chat entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('chat_delete', array('id' => $id)))
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
