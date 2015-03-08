<?php

namespace Lc\LcBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Lc\LcBundle\Entity\Admindoing;
use Lc\LcBundle\Form\AdmindoingType;

/**
 * Admindoing controller.
 *
 */
class AdmindoingController extends Controller
{

    /**
     * Lists all Admindoing entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('LcLcBundle:Admindoing')->findAll();

        return $this->render('LcLcBundle:Admindoing:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Admindoing entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Admindoing();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admindoing_show', array('id' => $entity->getId())));
        }

        return $this->render('LcLcBundle:Admindoing:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Admindoing entity.
     *
     * @param Admindoing $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Admindoing $entity)
    {
        $form = $this->createForm(new AdmindoingType(), $entity, array(
            'action' => $this->generateUrl('admindoing_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Admindoing entity.
     *
     */
    public function newAction()
    {
        $entity = new Admindoing();
        $form   = $this->createCreateForm($entity);

        return $this->render('LcLcBundle:Admindoing:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Admindoing entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LcLcBundle:Admindoing')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Admindoing entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('LcLcBundle:Admindoing:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Admindoing entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LcLcBundle:Admindoing')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Admindoing entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('LcLcBundle:Admindoing:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Admindoing entity.
    *
    * @param Admindoing $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Admindoing $entity)
    {
        $form = $this->createForm(new AdmindoingType(), $entity, array(
            'action' => $this->generateUrl('admindoing_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Admindoing entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LcLcBundle:Admindoing')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Admindoing entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('admindoing_edit', array('id' => $id)));
        }

        return $this->render('LcLcBundle:Admindoing:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Admindoing entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('LcLcBundle:Admindoing')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Admindoing entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admindoing'));
    }

    /**
     * Creates a form to delete a Admindoing entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admindoing_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
