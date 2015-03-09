<?php

namespace Lc\LcBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Lc\LcBundle\Entity\Flike;
use Lc\LcBundle\Form\FlikeType;

/**
 * Flike controller.
 *
 */
class FlikeController extends Controller
{

    /**
     * Lists all Flike entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('LcLcBundle:Flike')->findAll();

        return $this->render('LcLcBundle:Flike:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Flike entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Flike();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('flike_show', array('id' => $entity->getId())));
        }

        return $this->render('LcLcBundle:Flike:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Flike entity.
     *
     * @param Flike $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Flike $entity)
    {
        $form = $this->createForm(new FlikeType(), $entity, array(
            'action' => $this->generateUrl('flike_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Flike entity.
     *
     */
    public function newAction()
    {
        $entity = new Flike();
        $form   = $this->createCreateForm($entity);

        return $this->render('LcLcBundle:Flike:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Flike entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LcLcBundle:Flike')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Flike entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('LcLcBundle:Flike:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Flike entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LcLcBundle:Flike')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Flike entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('LcLcBundle:Flike:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Flike entity.
    *
    * @param Flike $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Flike $entity)
    {
        $form = $this->createForm(new FlikeType(), $entity, array(
            'action' => $this->generateUrl('flike_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Flike entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LcLcBundle:Flike')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Flike entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('flike_edit', array('id' => $id)));
        }

        return $this->render('LcLcBundle:Flike:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Flike entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('LcLcBundle:Flike')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Flike entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('flike'));
    }

    /**
     * Creates a form to delete a Flike entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('flike_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
