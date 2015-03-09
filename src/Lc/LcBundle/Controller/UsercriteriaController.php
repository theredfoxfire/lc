<?php

namespace Lc\LcBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Lc\LcBundle\Entity\Usercriteria;
use Lc\LcBundle\Form\UsercriteriaType;

/**
 * Usercriteria controller.
 *
 */
class UsercriteriaController extends Controller
{

    /**
     * Lists all Usercriteria entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('LcLcBundle:Usercriteria')->findAll();

        return $this->render('LcLcBundle:Usercriteria:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Usercriteria entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Usercriteria();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('usercriteria_show', array('id' => $entity->getId())));
        }

        return $this->render('LcLcBundle:Usercriteria:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Usercriteria entity.
     *
     * @param Usercriteria $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Usercriteria $entity)
    {
        $form = $this->createForm(new UsercriteriaType(), $entity, array(
            'action' => $this->generateUrl('usercriteria_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Usercriteria entity.
     *
     */
    public function newAction()
    {
        $entity = new Usercriteria();
        $form   = $this->createCreateForm($entity);

        return $this->render('LcLcBundle:Usercriteria:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Usercriteria entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LcLcBundle:Usercriteria')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Usercriteria entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('LcLcBundle:Usercriteria:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Usercriteria entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LcLcBundle:Usercriteria')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Usercriteria entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('LcLcBundle:Usercriteria:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Usercriteria entity.
    *
    * @param Usercriteria $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Usercriteria $entity)
    {
        $form = $this->createForm(new UsercriteriaType(), $entity, array(
            'action' => $this->generateUrl('usercriteria_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Usercriteria entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LcLcBundle:Usercriteria')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Usercriteria entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('usercriteria_edit', array('id' => $id)));
        }

        return $this->render('LcLcBundle:Usercriteria:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Usercriteria entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('LcLcBundle:Usercriteria')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Usercriteria entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('usercriteria'));
    }

    /**
     * Creates a form to delete a Usercriteria entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('usercriteria_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
