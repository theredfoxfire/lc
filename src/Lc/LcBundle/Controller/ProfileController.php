<?php

namespace Lc\LcBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
    public function ajaxAction(Request $request)
    {
        if (! $request->isXmlHttpRequest()) {
            throw new NotFoundHttpException();
        }

        // Get the province ID
        $id = $request->query->get('province_id');

        $result = array();

        // Return a list of cities, based on the selected province
        $repo = $this->getDoctrine()->getManager()->getRepository('LcLcBundle:City');
        $cities = $repo->findByProvince($id, array('name' => 'asc'));
        foreach ($cities as $city) {
            $result[$city->getName()] = $city->getId();
        }

        return new JsonResponse($result);
    }

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
        $fall = $em->getRepository('LcLcBundle:Friend')->fallCount($this->getUid()->getId());
        $chat = $em->getRepository('LcLcBundle:Chat')->unreadChatCount($this->getUid(), $this->getUid()->getId());
        $notify = $em->getRepository('LcLcBundle:Notification')->notyCount($this->getUid());

        return $this->render('LcLcBundle:Profile:index.html.twig', array(
            'entity' => $entity,
            'others' => $others,
            'fall' => $fall,
            'chat' => $chat,
            'notify' => $notify,
            'form' => $form->createView(),
        ));
    }


    public function profileAction()
    {
        $em = $this->getDoctrine()->getManager();

        $others = $em->getRepository('LcLcBundle:User')->loadOthers($this->getUid()->getSex(), $this->getUid()->getId());
        $fall = $em->getRepository('LcLcBundle:Friend')->fallCount($this->getUid()->getId());
        $chat = $em->getRepository('LcLcBundle:Chat')->unreadChatCount($this->getUid(), $this->getUid()->getId());
        $notify = $em->getRepository('LcLcBundle:Notification')->notyCount($this->getUid());
        $entity = $em->getRepository('LcLcBundle:Profile')->findOneByUser($this->getUid());

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Profile entity.');
        }

        $form = $this->createForm(
            new ProfileType($this->getDoctrine()->getManager()),
            $entity,
            array(
            'action' => $this->generateUrl('profile_update', array('id' => $entity->getToken())),
            'method' => 'POST',
        )
        );

        return $this->render('LcLcBundle:Profile:profile.html.twig', array(
            'entity' => $entity,
            'others' => $others,
            'fall' => $fall,
            'chat' => $chat,
            'notify' => $notify,
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
        $fall = $em->getRepository('LcLcBundle:Friend')->fallCount($this->getUid()->getId());
        $chat = $em->getRepository('LcLcBundle:Chat')->unreadChatCount($this->getUid(), $this->getUid()->getId());
        $notify = $em->getRepository('LcLcBundle:Notification')->notyCount($this->getUid());

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Profile entity.');
        }

        return $this->render('LcLcBundle:Profile:show.html.twig', array(
            'entity'      => $entity,
            'others' => $others,
            'fall' => $fall,
            'chat' => $chat,
            'notify' => $notify,
        ));
    }

    public function seeAction($token)
    {
        $em = $this->getDoctrine()->getManager();
        $paginator = $this->get('knp_paginator');
        $noty = new Notification();
        $fall = $em->getRepository('LcLcBundle:Friend')->fallCount($this->getUid()->getId());
        $chat = $em->getRepository('LcLcBundle:Chat')->unreadChatCount($this->getUid(), $this->getUid()->getId());
        $notify = $em->getRepository('LcLcBundle:Notification')->notyCount($this->getUid());

        $user = $em->getRepository('LcLcBundle:User')->findOneByToken($token);
        if (!$user) {
            throw $this->createNotFoundException('Unable to find Profile entity.');
        }

        $entity = $em->getRepository('LcLcBundle:Profile')->findOneByUser($user);
        $query = $em->getRepository('LcLcBundle:Feeling')->getUserFeelingPreview($entity);
        $c = $em->getRepository('LcLcBundle:Feeling')->countUserFeelingPreview($entity);
        $pagination = $paginator->paginate(
            $query,
            $this->get('request')->query->get('page', 1),
            25
        );

        $others = $em->getRepository('LcLcBundle:User')->loadOthers($this->getUid()->getSex(), $this->getUid()->getId());
        $friend = $em->getRepository('LcLcBundle:Friend')->check($this->getUid()->getId(), $user->getId());
        if (empty($friend)) {
            $friend = $em->getRepository('LcLcBundle:Friend')->check($user->getId(), $this->getUid()->getId());
        }

        //1 -> profile, 2 -> like, 3 -> comment
        //user 1 is visiting user 2 is visited
        $noty->setViewed(false);
        $noty->setUser1($this->getUid());
        $noty->setUser2($user);
        $noty->setSelfPage(0);
        $noty->setFromPage(1);
        $em->persist($noty);
        $em->flush();

        //exit(\Doctrine\Common\Util\Debug::dump($friend));

        return $this->render('LcLcBundle:Profile:see.html.twig', array(
            'entities' => $pagination,
            'c' => $c,
            'entity'      => $entity,
            'others' => $others,
            'friend' => $friend,
            'fall' => $fall,
            'chat' => $chat,
            'notify' => $notify,
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
     * Edits an existing Profile entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LcLcBundle:Profile')->findOneByToken($id);
        $fall = $em->getRepository('LcLcBundle:Friend')->fallCount($this->getUid()->getId());
        $chat = $em->getRepository('LcLcBundle:Chat')->unreadChatCount($this->getUid(), $this->getUid()->getId());
        $notify = $em->getRepository('LcLcBundle:Notification')->notyCount($this->getUid());
        //exit(\Doctrine\Common\Util\Debug::dump($entities));
        $others = $em->getRepository('LcLcBundle:User')->loadOthers($this->getUid()->getSex(), $this->getUid()->getId());

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Profile entity.');
        }

        $editForm = $this->createForm(
            new ProfileType($this->getDoctrine()->getManager()),
            $entity,
            array(
            'action' => $this->generateUrl('profile_update', array('id' => $entity->getToken())),
            'method' => 'POST',
        )
        );
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            $request->getSession()->getFlashBag()->add(
                'notice',
            'Data profile mu sudah terupdate! :D'
            );

            return $this->redirect($this->generateUrl('profile_data'));
        }

        return $this->render('LcLcBundle:Profile:profile.html.twig', array(
            'entity'      => $entity,
            'others' => $others,
            'fall' => $fall,
            'chat' => $chat,
            'notify' => $notify,
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

    public function getUid()
    {
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
