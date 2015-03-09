<?php

namespace Lc\LcBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Lc\LcBundle\Entity\Adminlog;
use Lc\LcBundle\Form\AdminlogType;

/**
 * Adminlog controller.
 *
 */
class AdminlogController extends Controller
{

    /**
     * Lists all Adminlog entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('LcLcBundle:Adminlog')->findAll();

        return $this->render('LcLcBundle:Adminlog:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Adminlog entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Adminlog();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('adminlog_show', array('id' => $entity->getId())));
        }

        return $this->render('LcLcBundle:Adminlog:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Adminlog entity.
     *
     * @param Adminlog $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Adminlog $entity)
    {
        $form = $this->createForm(new AdminlogType(), $entity, array(
            'action' => $this->generateUrl('adminlog_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Adminlog entity.
     *
     */
    public function newAction()
    {
        $entity = new Adminlog();
        $form   = $this->createCreateForm($entity);

        return $this->render('LcLcBundle:Adminlog:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Adminlog entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LcLcBundle:Adminlog')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Adminlog entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('LcLcBundle:Adminlog:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Adminlog entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LcLcBundle:Adminlog')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Adminlog entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('LcLcBundle:Adminlog:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Adminlog entity.
    *
    * @param Adminlog $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Adminlog $entity)
    {
        $form = $this->createForm(new AdminlogType(), $entity, array(
            'action' => $this->generateUrl('adminlog_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Adminlog entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LcLcBundle:Adminlog')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Adminlog entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('adminlog_edit', array('id' => $id)));
        }

        return $this->render('LcLcBundle:Adminlog:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Adminlog entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('LcLcBundle:Adminlog')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Adminlog entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('adminlog'));
    }

    /**
     * Creates a form to delete a Adminlog entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('adminlog_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
