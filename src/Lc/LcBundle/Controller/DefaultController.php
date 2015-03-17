<?php

namespace Lc\LcBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Lc\LcBundle\Entity\User;
use Lc\LcBundle\Form\UserType;

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
}
