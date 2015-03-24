<?php

namespace Lc\LcBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Lc\LcBundle\Entity\User;
use Lc\LcBundle\Form\UserType;

use Symfony\Component\Security\Core\SecurityContext;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $entity = new User();
        $form = $this->createCreateForm($entity);
        
        return $this->render('LcLcBundle:Default:index.html.twig', array(
			 'form'   => $form->createView()
        ));
    }
    
    private function createCreateForm(User $entity)
    {
        $form = $this->createForm(new UserType(), $entity, array(
            'action' => $this->generateUrl('user_create'),
            'method' => 'POST',
            'attr' => array('class' => 'register-area'),
        ));        
		$form->add('submit', 'submit', array('label' => false, 'attr' => array('class'=>'btn btn-default btn-lg pull-right')));
        return $form;
    }
    
    public function loginAction()
    {
        $request = $this->getRequest();
        $session = $request->getSession();
 
        // get the login error if there is one
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
            $session->remove(SecurityContext::AUTHENTICATION_ERROR);
        }
 
        return $this->render('LcLcBundle:Default:index.html.twig', array(
            // last username entered by the user
            'last_username' => $session->get(SecurityContext::LAST_USERNAME),
            'error'         => $error,
        ));
    }
}
