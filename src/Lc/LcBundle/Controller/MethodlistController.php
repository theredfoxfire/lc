<?php

namespace Lc\LcBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Lc\LcBundle\Entity\Methodlist;
use Lc\LcBundle\Form\MethodlistType;

/**
 * Methodlist controller.
 *
 */
class MethodlistController extends Controller
{

    /**
     * Lists all Methodlist entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('LcLcBundle:Methodlist')->findAll();

        return $this->render('LcLcBundle:Methodlist:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Methodlist entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Methodlist();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('methodlist_show', array('id' => $entity->getId())));
        }

        return $this->render('LcLcBundle:Methodlist:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Methodlist entity.
     *
     * @param Methodlist $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Methodlist $entity)
    {
        $form = $this->createForm(new MethodlistType(), $entity, array(
            'action' => $this->generateUrl('methodlist_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Methodlist entity.
     *
     */
    public function newAction()
    {
        $entity = new Methodlist();
        $form   = $this->createCreateForm($entity);

        return $this->render('LcLcBundle:Methodlist:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Methodlist entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LcLcBundle:Methodlist')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Methodlist entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('LcLcBundle:Methodlist:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Methodlist entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LcLcBundle:Methodlist')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Methodlist entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('LcLcBundle:Methodlist:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Methodlist entity.
    *
    * @param Methodlist $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Methodlist $entity)
    {
        $form = $this->createForm(new MethodlistType(), $entity, array(
            'action' => $this->generateUrl('methodlist_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Methodlist entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LcLcBundle:Methodlist')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Methodlist entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('methodlist_edit', array('id' => $id)));
        }

        return $this->render('LcLcBundle:Methodlist:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Methodlist entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('LcLcBundle:Methodlist')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Methodlist entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('methodlist'));
    }

    /**
     * Creates a form to delete a Methodlist entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('methodlist_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
