<?php

namespace Lc\LcBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Lc\LcBundle\Entity\User;
use Lc\LcBundle\Form\UserType;
use Lc\LcBundle\Entity\Forgot;
use Lc\LcBundle\Form\ForgotType;
use Lc\LcBundle\Entity\Repair;
use Lc\LcBundle\Form\RepairType;

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
    
    public function agreementAction()
    {
        
        return $this->render('LcLcBundle:Default:agreement.html.twig');
    }
    
    public function repairAction(Request $request, $token)
    {
        $entity = new Repair();
        $form = $this->createForm(new RepairType(), $entity,
			array(
			'action' => $this->generateUrl('repair', array('token' => $token)),
            'method' => 'POST',
            'attr' => array('class' => 'login-area', 'role'=>"form"),
        ));
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('LcLcBundle:User')->findOneByToken($token);
        if (!$entity) {
			return $this->render('LcLcBundle:User:sorry.html.twig');
		}
        
        $form->handleRequest($request);
        if ($form->isValid()) {
			$formData = $request->get('repair');
            $ps = $formData['password']['first'];
            
            $factory = $this->get('security.encoder_factory');
			$encoder = $factory->getEncoder($entity);
			$ep = $encoder->encodePassword($ps, $entity->getSalt());
            
            $st = date('Y-m-d H:i:s');
			$st = $st.$entity->getEmail();
			$token = sha1($st.rand(11111, 99999));
			
			$entity->setPassword($ep);
			$entity->setToken($token);
            $em->persist($entity);
            $em->flush();
            
            return $this->render('LcLcBundle:Default:repaired.html.twig', array(
					 'name'   => $entity->getProfile()->getName(),
				));
		}
        
        return $this->render('LcLcBundle:Default:repair.html.twig', array(
			 'form'   => $form->createView()
        ));
    }
    
    public function forgotAction(Request $request)
    {
        $entity = new Forgot();
        $email = "";
        $form = $this->createForm(new ForgotType(), $entity,
			array(
			'action' => $this->generateUrl('forgot'),
            'method' => 'POST',
            'attr' => array('class' => 'login-area', 'role'=>"form"),
            ));
        $form->add('email', 'email',array('attr'=>array('class'=>'form-control', 'value'=>$email,'placeholder'=>'Masukan email Anda'), 'label'=>false));
            
        $form->handleRequest($request);
        if ($form->isValid()) {
			$formData = $request->get('forgot');
            $email = $formData['email'];
            $form = $this->createForm(new ForgotType(), $entity,
			array(
				'action' => $this->generateUrl('forgot'),
				'method' => 'POST',
				'attr' => array('class' => 'login-area', 'role'=>"form"),
            ));
			$form->add('email', 'email',array('attr'=>array('class'=>'form-control', 'value'=>$email,'placeholder'=>'Masukan email Anda'), 'label'=>false));
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('LcLcBundle:User')->findOneByEmail($email);

            if (!$entity) {
				$request->getSession()->getFlashBag()->add('notice', 
				'Kami tidak menemukan satupun akun yang cocok dengan email tersebut');
				
                return $this->render('LcLcBundle:Default:forgot.html.twig', array(
					 'form'   => $form->createView(),
				));
			}
			
			/*
			email section
			*/
			
			$transport = \Swift_SmtpTransport::newInstance('lucidcouple.com',587,'tls')
			->setUsername('registration@lucidcouple.com')->setPassword('13264656#vL');
			
			$mailer = \Swift_Mailer::newInstance($transport);
			
			$message = \Swift_Message::newInstance()
                ->setSubject('Reset Password Akun LUCIDCOUPLE')
                ->setFrom('member@lucidcouple.com')
                ->setTo($email)
                ->setBody(
                    $this->renderView('LcLcBundle:User:forgot.txt.twig', array('token' => $entity->getToken(), 'name' => $entity->getProfile()->getName())))
            ;
 
            $mailer->send($message);
            
            return $this->render('LcLcBundle:Default:forgotsent.html.twig', array(
					 'name'   => $entity->getProfile()->getName(),
				));
		}
        
        return $this->render('LcLcBundle:Default:forgot.html.twig', array(
			 'form'   => $form->createView(),
        ));
    }
    
    private function createCreateForm(User $entity)
    {
        $form = $this->createForm(new UserType(), $entity, array(
            'action' => $this->generateUrl('user_create'),
            'method' => 'POST',
            'attr' => array('class' => 'register-area'),
        ));        
		$form->add('file', 'hidden', array('label' => false, 'attr' => array('class'=>'btn btn-default btn-lg pull-right')));
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
 
        return $this->render('LcLcBundle:Default:login.html.twig', array(
            // last username entered by the user
            'last_username' => $session->get(SecurityContext::LAST_USERNAME),
            'error'         => $error,
        ));
    }
}
