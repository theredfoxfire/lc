<?php

namespace Lc\LcBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Lc\LcBundle\Entity\Province;
use Lc\LcBundle\Form\ProvinceType;

/**
 * Province controller.
 *
 */
class ProvinceController extends Controller
{

    /**
     * Lists all Province entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('LcLcBundle:Province')->findAll();

        return $this->render('LcLcBundle:Province:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Province entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Province();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('province_show', array('id' => $entity->getId())));
        }

        return $this->render('LcLcBundle:Province:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Province entity.
     *
     * @param Province $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Province $entity)
    {
        $form = $this->createForm(new ProvinceType(), $entity, array(
            'action' => $this->generateUrl('province_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Province entity.
     *
     */
    public function newAction()
    {
        $entity = new Province();
        $form   = $this->createCreateForm($entity);

        return $this->render('LcLcBundle:Province:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Province entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LcLcBundle:Province')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Province entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('LcLcBundle:Province:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Province entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LcLcBundle:Province')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Province entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('LcLcBundle:Province:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Province entity.
    *
    * @param Province $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Province $entity)
    {
        $form = $this->createForm(new ProvinceType(), $entity, array(
            'action' => $this->generateUrl('province_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Province entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LcLcBundle:Province')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Province entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('province_edit', array('id' => $id)));
        }

        return $this->render('LcLcBundle:Province:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Province entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('LcLcBundle:Province')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Province entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('province'));
    }

    /**
     * Creates a form to delete a Province entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('province_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
