<?php

namespace Lc\LcBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Lc\LcBundle\Entity\User;
use Lc\LcBundle\Entity\Usercriteria;
use Lc\LcBundle\Entity\Profile;
use Lc\LcBundle\Form\UserType;
use Lc\LcBundle\Form\DatauType;

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
			$entity->setPassword($ep);
			$entity->setIsActive(false);
            $em->persist($entity);
            $em->flush();
            
            $em = $this->getDoctrine()->getManager();
			$entity = $em->getRepository('LcLcBundle:User')->findOneByEmail($formData['email']);
		/*
		email section
		*/
			$message = \Swift_Message::newInstance()
                ->setSubject('Aktivasi Akun LUCIDCOUPLE')
                ->setFrom('member@lucidcouple.com')
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
        $profile = new Profile();
        $criteria = new Usercriteria();

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find User entity.');
        }
        $entity->setIsActive(true);
        $em->flush();
        
        $profile->setUser($entity);
        $em->persist($profile);
        $em->flush();
        
        $criteria->setUser($entity);
        $em->persist($criteria);
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
        $user = $em->getRepository('LcLcBundle:User')->findOneByToken($token);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find User entity.');
        }

        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);
        
        if ($editForm->isValid()) {
			$entity->setPassword($user->getPassword());
			$em->persist($entity);
            $em->flush();

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
}
