<?php

namespace Lc\LcBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Lc\LcBundle\Entity\Userdoing;
use Lc\LcBundle\Form\UserdoingType;

/**
 * Userdoing controller.
 *
 */
class UserdoingController extends Controller
{

    /**
     * Lists all Userdoing entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('LcLcBundle:Userdoing')->findAll();

        return $this->render('LcLcBundle:Userdoing:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Userdoing entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Userdoing();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('userdoing_show', array('id' => $entity->getId())));
        }

        return $this->render('LcLcBundle:Userdoing:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Userdoing entity.
     *
     * @param Userdoing $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Userdoing $entity)
    {
        $form = $this->createForm(new UserdoingType(), $entity, array(
            'action' => $this->generateUrl('userdoing_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Userdoing entity.
     *
     */
    public function newAction()
    {
        $entity = new Userdoing();
        $form   = $this->createCreateForm($entity);

        return $this->render('LcLcBundle:Userdoing:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Userdoing entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LcLcBundle:Userdoing')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Userdoing entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('LcLcBundle:Userdoing:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Userdoing entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LcLcBundle:Userdoing')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Userdoing entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('LcLcBundle:Userdoing:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Userdoing entity.
    *
    * @param Userdoing $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Userdoing $entity)
    {
        $form = $this->createForm(new UserdoingType(), $entity, array(
            'action' => $this->generateUrl('userdoing_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Userdoing entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LcLcBundle:Userdoing')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Userdoing entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('userdoing_edit', array('id' => $id)));
        }

        return $this->render('LcLcBundle:Userdoing:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Userdoing entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('LcLcBundle:Userdoing')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Userdoing entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('userdoing'));
    }

    /**
     * Creates a form to delete a Userdoing entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('userdoing_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
