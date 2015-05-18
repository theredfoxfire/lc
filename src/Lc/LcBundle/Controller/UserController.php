<?php

namespace Lc\LcBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Lc\LcBundle\Entity\User;
use Lc\LcBundle\Entity\Friend;
use Lc\LcBundle\Entity\Foto;
use Lc\LcBundle\Entity\ChangePassword;
use Lc\LcBundle\Entity\Usercriteria;
use Lc\LcBundle\Entity\Profile;
use Lc\LcBundle\Form\UserType;
use Lc\LcBundle\Form\FotoType;
use Lc\LcBundle\Form\DatauType;
use Lc\LcBundle\Form\ChangePasswordType;

/**
 * User controller.
 *
 */
class UserController extends Controller
{

    /**
     * Lists all User entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('LcLcBundle:User')->findAll();

        return $this->render('LcLcBundle:User:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    
    
    public function allAction()
    {
        $em = $this->getDoctrine()->getManager();
        
        $paginator = $this->get('knp_paginator');
        $query = $em->getRepository('LcLcBundle:User')->loadAll($this->getUid()->getSex(), $this->getUid()->getId(), null);
        
        $pagination = $paginator->paginate(
			$query,
			$this->get('request')->query->get('page', 1),
			16
		);
        $others = $em->getRepository('LcLcBundle:User')->loadOthers($this->getUid()->getSex(), $this->getUid()->getId());
        $fall = $em->getRepository('LcLcBundle:Friend')->fallCount($this->getUid()->getId());
        $chat = $em->getRepository('LcLcBundle:Chat')->unreadChatCount($this->getUid(), $this->getUid()->getId());
        $notify = $em->getRepository('LcLcBundle:Notification')->notyCount($this->getUid());
        
        $c = $em->getRepository('LcLcBundle:User')->countAll($this->getUid()->getSex(), $this->getUid()->getId());
        $cp = count($pagination);

        return $this->render('LcLcBundle:User:all.html.twig', array(
            'entities' => $pagination,
            'others' => $others,
            'c' => $c,
            'cp' => $cp,
            'fall' => $fall,
            'chat' => $chat,
            'notify' => $notify,
        ));
    }
    
    public function searchAction()
    {
        $em = $this->getDoctrine()->getManager();
        $key = $this->getRequest()->get('query');
        $paginator = $this->get('knp_paginator');
        if($key)
        {
			$query = $em->getRepository('LcLcBundle:User')->loadAll($this->getUid()->getSex(), $this->getUid()->getId(), $key);
		}
		else
		{
			$query = $em->getRepository('LcLcBundle:User')->loadAll($this->getUid()->getSex(), $this->getUid()->getId(), null);
		}
        
        $pagination = $paginator->paginate(
			$query,
			$this->get('request')->query->get('page', 1),
			16
		);
        $others = $em->getRepository('LcLcBundle:User')->loadOthers($this->getUid()->getSex(), $this->getUid()->getId());
        $fall = $em->getRepository('LcLcBundle:Friend')->fallCount($this->getUid()->getId());
        $chat = $em->getRepository('LcLcBundle:Chat')->unreadChatCount($this->getUid(), $this->getUid()->getId());
        $notify = $em->getRepository('LcLcBundle:Notification')->notyCount($this->getUid());
        
        $c = $em->getRepository('LcLcBundle:User')->countSearchAll($this->getUid()->getSex(), $this->getUid()->getId(), $key);
        $cp = count($pagination);

        return $this->render('LcLcBundle:User:search.html.twig', array(
            'entities' => $pagination,
            'others' => $others,
            'c' => $c,
            'cp' => $cp,
            'fall' => $fall,
            'chat' => $chat,
            'notify' => $notify,
        ));
    }
    
    public function waitAction()
    {
        return $this->render('LcLcBundle:User:wait.html.twig');
    }
    /**
     * Creates a new User entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new User();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $formData = $request->get('lc_lcbundle_user');
            $ps = $formData['password'];
            
            $factory = $this->get('security.encoder_factory');
			$encoder = $factory->getEncoder($entity);
			$ep = $encoder->encodePassword($ps, $entity->getSalt());
            
			$entity->setUsername($formData['email']);
			if($formData['sex'] == 1){
				$entity->setFoto('p.jpeg');
			} else {
				$entity->setFoto('w.png');
			}
			$entity->setPassword($ep);
			$entity->setIsActive(false);
			$entity->setBroad(false);
            $em->persist($entity);
            $em->flush();
            
            $em = $this->getDoctrine()->getManager();
			$entity = $em->getRepository('LcLcBundle:User')->findOneByEmail($formData['email']);
		/*
		email section
		*/
		
			$message = \Swift_Message::newInstance()
                ->setSubject('Aktivasi Akun LUCIDCOUPLE')
                ->setFrom('registration@lucidcouple.com')
                ->setTo($entity->getEmail())
                ->setBody(
                    $this->renderView('LcLcBundle:User:email.txt.twig', array('token' => $entity->getToken(), 'email' => $entity->getEmail())))
            ;
 
            $this->get('mailer')->send($message);
		
            return $this->redirect($this->generateUrl('user_wait'));
        }

        return $this->render('LcLcBundle:User:create.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a User entity.
     *
     * @param User $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(User $entity)
    {
        $form = $this->createForm(new UserType(), $entity, array(
            'action' => $this->generateUrl('user_create'),
            'method' => 'POST',
            'attr' => array('class' => 'register-area'),
        ));        
		$form->add('submit', 'submit', array('label' => false, 'attr' => array('class'=>'btn btn-default btn-lg pull-right', 'focus' =>'focus')));
		$form->add('file', 'hidden', array('label' => false, 'attr' => array('class'=>'btn btn-default btn-lg pull-right')));

        return $form;
    }

    /**
     * Displays a form to create a new User entity.
     *
     */
    public function newAction()
    {
        $entity = new User();
        $form   = $this->createCreateForm($entity);

        return $this->render('LcLcBundle:User:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a User entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LcLcBundle:User')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find User entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('LcLcBundle:User:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing User entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LcLcBundle:User')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find User entity.');
        }

        $editForm = $this->createEditForm($entity);

        return $this->render('LcLcBundle:User:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        ));
    }
    
	public function activateAction($token)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LcLcBundle:User')->findOneByToken($token);
        $broad = $em->getRepository('LcLcBundle:User')->findOneById(1);
        
        $profile = new Profile();
        $criteria = new Usercriteria();

        if (!$entity) {
            return $this->render('LcLcBundle:User:sorry.html.twig');
        }
        
        $st = date('Y-m-d H:i:s');
		$st = $st.$entity->getEmail();
		$token = sha1($st.rand(11111, 99999));
		
        $entity->setIsActive(true);
        $entity->setToken($token);
        $em->flush();
        
        $profile->setUser($entity);
        $profile->setName($entity->getEmail());
        $em->persist($profile);
        $em->flush();
        
        $criteria->setUser($entity);
        $em->persist($criteria);
        $em->flush();
        
        $mate = new Friend();
        $mate->setUser1($entity);
		$mate->setUser2($broad);
		$mate->setStatus(true);
		$mate->setCast(true);
		$mate->setIsConfirmed(true);
		$em->persist($mate);
		$em->flush();
		
		$cast = new Friend();
        $cast->setUser1($broad);
		$cast->setUser2($entity);
		$cast->setStatus(true);
		$cast->setCast(true);
		$cast->setIsConfirmed(true);
		$em->persist($cast);
		$em->flush();

        return $this->render('LcLcBundle:User:thanks.html.twig', array(
            'email'      => $entity->getEmail(),
        ));
    }

    /**
    * Creates a form to edit a User entity.
    *
    * @param User $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(User $entity)
    {
        $form = $this->createForm(new DatauType(), $entity, array(
            'action' => $this->generateUrl('user_update', array('token' => $entity->getToken())),
            'method' => 'POST',
            'attr' => array('class' => 'form-horizontal'),
        ));        
        return $form;
    }
    /**
     * Edits an existing User entity.
     *
     */
    public function updateAction(Request $request, $token)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LcLcBundle:User')->findOneByToken($token);
        $password = $entity->getPassword();
        

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find User entity.');
        }

        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);
        
        if ($editForm->isValid()) {
			$entity->setPassword($password);
			$em->persist($entity);
            $em->flush();
            
            $request->getSession()->getFlashBag()->add('notice', 
            'Data profile mu sudah terupdate! :D');

            return $this->redirect($this->generateUrl('profile'));
        }

        return $this->render('LcLcBundle:Profile:index.html.twig', array(
            'entity'      => $entity,
            'form'   => $editForm->createView(),
        ));
    }
    /**
     * Deletes a User entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('LcLcBundle:User')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find User entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('user'));
    }

    /**
     * Creates a form to delete a User entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('user_delete', array('id' => $id)))
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
	
	public function changePasswdAction(Request $request)
    {
		
	  $em = $this->getDoctrine()->getManager();
	  $others = $em->getRepository('LcLcBundle:User')->loadOthers($this->getUid()->getSex(), $this->getUid()->getId());
	  $fall = $em->getRepository('LcLcBundle:Friend')->fallCount($this->getUid()->getId());
      $chat = $em->getRepository('LcLcBundle:Chat')->unreadChatCount($this->getUid(), $this->getUid()->getId());
      $notify = $em->getRepository('LcLcBundle:Notification')->notyCount($this->getUid());
      $changePasswordModel = new ChangePassword();
      $form = $this->createForm(new ChangePasswordType(), $changePasswordModel);

      $form->handleRequest($request);

      if ($form->isSubmitted() && $form->isValid()) {
            $formData = $request->get('change_passwd');
            $ps = $formData['newPassword']['first'];
            $entity = $this->getUid();
            
            $factory = $this->get('security.encoder_factory');
			$encoder = $factory->getEncoder($entity);
			$ep = $encoder->encodePassword($ps, $entity->getSalt());
			
			$entity->setPassword($ep);
            $em->persist($entity);
            $em->flush();
                        
			$request->getSession()->getFlashBag()->add('notice', 
            'Password mu sudah terupdate! :D');
      }

      return $this->render('LcLcBundle:User:changePwd.html.twig', array(
          'form' => $form->createView(),
          'others' => $others,
          'fall' => $fall,
          'chat' => $chat,
          'notify' => $notify,
      ));      
    }
    
    public function fotoAction(Request $request)
    {
	  $em = $this->getDoctrine()->getManager();
		
      $entity = $this->getUid();
      
      $others = $em->getRepository('LcLcBundle:User')->loadOthers($this->getUid()->getSex(), $this->getUid()->getId());
      $fall = $em->getRepository('LcLcBundle:Friend')->fallCount($this->getUid()->getId());
      $chat = $em->getRepository('LcLcBundle:Chat')->unreadChatCount($this->getUid(), $this->getUid()->getId());
      $notify = $em->getRepository('LcLcBundle:Notification')->notyCount($this->getUid());
      $password = $entity->getPassword();
      $form = $this->createForm(new FotoType(), $entity, array(
            'action' => $this->generateUrl('user_foto'),
            'method' => 'POST',
            'attr' => array('class' => 'form-horizontal', 'onsubmit' => 'return Validate(this);'),
            
        ));        

      $form->handleRequest($request);

      if ($form->isValid()) {
			$entity->setPassword($password);
            $em->persist($entity);
            $em->flush();
            
            $request->getSession()->getFlashBag()->add('notice', 
            'Foto mu sudah terupdate! :D');
      }

      return $this->render('LcLcBundle:User:foto.html.twig', array(
          'form' => $form->createView(),
          'entity' => $entity,
          'others' => $others,
          'fall' => $fall,
          'chat' => $chat,
          'notify' => $notify,
      ));      
    }
}
