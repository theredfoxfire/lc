<?php

namespace Lc\LcBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Lc\LcBundle\Entity\Admin;
use Lc\LcBundle\Form\AdminType;

/**
 * Admin controller.
 *
 */
class AdminController extends Controller
{

    /**
     * Lists all Admin entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('LcLcBundle:Admin')->findAll();

        return $this->render('LcLcBundle:Admin:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Admin entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Admin();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_show', array('id' => $entity->getId())));
        }

        return $this->render('LcLcBundle:Admin:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Admin entity.
     *
     * @param Admin $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Admin $entity)
    {
        $form = $this->createForm(new AdminType(), $entity, array(
            'action' => $this->generateUrl('admin_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Admin entity.
     *
     */
    public function newAction()
    {
        $entity = new Admin();
        $form   = $this->createCreateForm($entity);

        return $this->render('LcLcBundle:Admin:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Admin entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LcLcBundle:Admin')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Admin entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('LcLcBundle:Admin:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Admin entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LcLcBundle:Admin')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Admin entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('LcLcBundle:Admin:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Admin entity.
    *
    * @param Admin $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Admin $entity)
    {
        $form = $this->createForm(new AdminType(), $entity, array(
            'action' => $this->generateUrl('admin_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Admin entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LcLcBundle:Admin')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Admin entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('admin_edit', array('id' => $id)));
        }

        return $this->render('LcLcBundle:Admin:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Admin entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('LcLcBundle:Admin')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Admin entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin'));
    }

    /**
     * Creates a form to delete a Admin entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
