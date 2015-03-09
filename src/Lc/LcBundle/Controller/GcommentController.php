<?php

namespace Lc\LcBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Lc\LcBundle\Entity\Gcomment;
use Lc\LcBundle\Form\GcommentType;

/**
 * Gcomment controller.
 *
 */
class GcommentController extends Controller
{

    /**
     * Lists all Gcomment entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('LcLcBundle:Gcomment')->findAll();

        return $this->render('LcLcBundle:Gcomment:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Gcomment entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Gcomment();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('gcomment_show', array('id' => $entity->getId())));
        }

        return $this->render('LcLcBundle:Gcomment:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Gcomment entity.
     *
     * @param Gcomment $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Gcomment $entity)
    {
        $form = $this->createForm(new GcommentType(), $entity, array(
            'action' => $this->generateUrl('gcomment_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Gcomment entity.
     *
     */
    public function newAction()
    {
        $entity = new Gcomment();
        $form   = $this->createCreateForm($entity);

        return $this->render('LcLcBundle:Gcomment:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Gcomment entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LcLcBundle:Gcomment')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Gcomment entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('LcLcBundle:Gcomment:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Gcomment entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LcLcBundle:Gcomment')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Gcomment entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('LcLcBundle:Gcomment:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Gcomment entity.
    *
    * @param Gcomment $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Gcomment $entity)
    {
        $form = $this->createForm(new GcommentType(), $entity, array(
            'action' => $this->generateUrl('gcomment_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Gcomment entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LcLcBundle:Gcomment')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Gcomment entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('gcomment_edit', array('id' => $id)));
        }

        return $this->render('LcLcBundle:Gcomment:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Gcomment entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('LcLcBundle:Gcomment')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Gcomment entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('gcomment'));
    }

    /**
     * Creates a form to delete a Gcomment entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('gcomment_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
