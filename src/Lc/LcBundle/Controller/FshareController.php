<?php

namespace Lc\LcBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Lc\LcBundle\Entity\Fshare;
use Lc\LcBundle\Entity\Feeling;
use Lc\LcBundle\Form\FshareType;
use Lc\LcBundle\Entity\Notification;

/**
 * Fshare controller.
 *
 */
class FshareController extends Controller
{

    /**
     * Lists all Fshare entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('LcLcBundle:Fshare')->findAll();

        return $this->render('LcLcBundle:Fshare:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Fshare entity.
     *
     */
    public function createAction($feel, $page = null)
    {
        $entity = new Fshare();
        $feelNew = new Feeling();
        $em = $this->getDoctrine()->getManager();
        $feeling = $em->getRepository('LcLcBundle:Feeling')->findOneByToken($feel);
        $feelNew->setIsActive(true);
        $feelNew->setUser($this->getUid());
        $feelNew->setFeel($feeling->getFeel());
        $feelNew->setFoto($feeling->getFoto());
        $feelNew->setParent($feeling);
        $em->persist($feelNew);
        $em->flush();

        $user = $this->getUid();
        $user->setUpdatedAt(new \DateTime());
        $em->persist($user);
        $em->flush();

        $noty = new Notification();
        //user 1 is liker user 2 is liked
        $noty->setViewed(false);
        $noty->setUser1($this->getUid());
        $noty->setUser2($feeling->getUser());
        $noty->setFromPage(6);
        if ($this->getUid()->getId() == $feeling->getUser()->getId()) {
            $noty->setSelfPage($this->getUid()->getId());
        } else {
            $noty->setSelfPage(0);
        }
        $noty->setFromId($feelNew->getToken());
        $em->persist($noty);
        $em->flush();

        $entity->setStatus(1);
        $entity->setUser($this->getUid());
        $entity->setFeeling($feeling);
        $em->persist($entity);
        $em->flush();
        if ($page == 1) {
            return $this->redirect($this->generateUrl('feeling_show', array('token' => $feel)));
        } elseif ($page == 3) {
            return $this->redirect($this->generateUrl('profile_see', array('token' => $feeling->getUser()->getToken())).'?page='.$_GET['page'].'#'.$feel);
        } else {
            return $this->redirect($this->generateUrl('feeling').'?page='.$_GET['page'].'#'.$feel);
        }
    }

    /**
     * Creates a form to create a Fshare entity.
     *
     * @param Fshare $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Fshare $entity)
    {
        $form = $this->createForm(new FshareType(), $entity, array(
            'action' => $this->generateUrl('fshare_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Fshare entity.
     *
     */
    public function newAction()
    {
        $entity = new Fshare();
        $form   = $this->createCreateForm($entity);

        return $this->render('LcLcBundle:Fshare:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Fshare entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LcLcBundle:Fshare')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Fshare entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('LcLcBundle:Fshare:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Fshare entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LcLcBundle:Fshare')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Fshare entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('LcLcBundle:Fshare:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Fshare entity.
    *
    * @param Fshare $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Fshare $entity)
    {
        $form = $this->createForm(new FshareType(), $entity, array(
            'action' => $this->generateUrl('fshare_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Fshare entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LcLcBundle:Fshare')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Fshare entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('fshare_edit', array('id' => $id)));
        }

        return $this->render('LcLcBundle:Fshare:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Fshare entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('LcLcBundle:Fshare')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Fshare entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('fshare'));
    }

    /**
     * Creates a form to delete a Fshare entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('fshare_delete', array('id' => $id)))
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
}
