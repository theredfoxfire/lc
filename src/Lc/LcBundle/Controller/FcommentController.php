<?php

namespace Lc\LcBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Lc\LcBundle\Entity\Fcomment;
use Lc\LcBundle\Form\FcommentType;

/**
 * Fcomment controller.
 *
 */
class FcommentController extends Controller
{

    /**
     * Lists all Fcomment entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('LcLcBundle:Fcomment')->findAll();

        return $this->render('LcLcBundle:Fcomment:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Fcomment entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Fcomment();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('fcomment_show', array('id' => $entity->getId())));
        }

        return $this->render('LcLcBundle:Fcomment:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Fcomment entity.
     *
     * @param Fcomment $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Fcomment $entity)
    {
        $form = $this->createForm(new FcommentType(), $entity, array(
            'action' => $this->generateUrl('fcomment_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Fcomment entity.
     *
     */
    public function newAction()
    {
        $entity = new Fcomment();
        $form   = $this->createCreateForm($entity);

        return $this->render('LcLcBundle:Fcomment:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Fcomment entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LcLcBundle:Fcomment')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Fcomment entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('LcLcBundle:Fcomment:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Fcomment entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LcLcBundle:Fcomment')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Fcomment entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('LcLcBundle:Fcomment:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Fcomment entity.
    *
    * @param Fcomment $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Fcomment $entity)
    {
        $form = $this->createForm(new FcommentType(), $entity, array(
            'action' => $this->generateUrl('fcomment_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Fcomment entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LcLcBundle:Fcomment')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Fcomment entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('fcomment_edit', array('id' => $id)));
        }

        return $this->render('LcLcBundle:Fcomment:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Fcomment entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('LcLcBundle:Fcomment')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Fcomment entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('fcomment'));
    }

    /**
     * Creates a form to delete a Fcomment entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('fcomment_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
