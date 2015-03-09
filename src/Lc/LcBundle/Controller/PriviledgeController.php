<?php

namespace Lc\LcBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Lc\LcBundle\Entity\Priviledge;
use Lc\LcBundle\Form\PriviledgeType;

/**
 * Priviledge controller.
 *
 */
class PriviledgeController extends Controller
{

    /**
     * Lists all Priviledge entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('LcLcBundle:Priviledge')->findAll();

        return $this->render('LcLcBundle:Priviledge:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Priviledge entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Priviledge();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('priviledge_show', array('id' => $entity->getId())));
        }

        return $this->render('LcLcBundle:Priviledge:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Priviledge entity.
     *
     * @param Priviledge $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Priviledge $entity)
    {
        $form = $this->createForm(new PriviledgeType(), $entity, array(
            'action' => $this->generateUrl('priviledge_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Priviledge entity.
     *
     */
    public function newAction()
    {
        $entity = new Priviledge();
        $form   = $this->createCreateForm($entity);

        return $this->render('LcLcBundle:Priviledge:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Priviledge entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LcLcBundle:Priviledge')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Priviledge entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('LcLcBundle:Priviledge:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Priviledge entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LcLcBundle:Priviledge')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Priviledge entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('LcLcBundle:Priviledge:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Priviledge entity.
    *
    * @param Priviledge $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Priviledge $entity)
    {
        $form = $this->createForm(new PriviledgeType(), $entity, array(
            'action' => $this->generateUrl('priviledge_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Priviledge entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LcLcBundle:Priviledge')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Priviledge entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('priviledge_edit', array('id' => $id)));
        }

        return $this->render('LcLcBundle:Priviledge:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Priviledge entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('LcLcBundle:Priviledge')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Priviledge entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('priviledge'));
    }

    /**
     * Creates a form to delete a Priviledge entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('priviledge_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
