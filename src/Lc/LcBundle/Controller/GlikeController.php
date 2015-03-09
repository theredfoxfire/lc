<?php

namespace Lc\LcBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Lc\LcBundle\Entity\Glike;
use Lc\LcBundle\Form\GlikeType;

/**
 * Glike controller.
 *
 */
class GlikeController extends Controller
{

    /**
     * Lists all Glike entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('LcLcBundle:Glike')->findAll();

        return $this->render('LcLcBundle:Glike:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Glike entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Glike();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('glike_show', array('id' => $entity->getId())));
        }

        return $this->render('LcLcBundle:Glike:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Glike entity.
     *
     * @param Glike $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Glike $entity)
    {
        $form = $this->createForm(new GlikeType(), $entity, array(
            'action' => $this->generateUrl('glike_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Glike entity.
     *
     */
    public function newAction()
    {
        $entity = new Glike();
        $form   = $this->createCreateForm($entity);

        return $this->render('LcLcBundle:Glike:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Glike entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LcLcBundle:Glike')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Glike entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('LcLcBundle:Glike:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Glike entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LcLcBundle:Glike')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Glike entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('LcLcBundle:Glike:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Glike entity.
    *
    * @param Glike $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Glike $entity)
    {
        $form = $this->createForm(new GlikeType(), $entity, array(
            'action' => $this->generateUrl('glike_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Glike entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LcLcBundle:Glike')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Glike entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('glike_edit', array('id' => $id)));
        }

        return $this->render('LcLcBundle:Glike:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Glike entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('LcLcBundle:Glike')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Glike entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('glike'));
    }

    /**
     * Creates a form to delete a Glike entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('glike_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
