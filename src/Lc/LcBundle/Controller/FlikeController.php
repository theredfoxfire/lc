<?php

namespace Lc\LcBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Lc\LcBundle\Entity\Flike;
use Lc\LcBundle\Entity\Feeling;
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
    public function createAction($feel = null, $page = null)
    {
        $entity = new Flike();
        $em = $this->getDoctrine()->getManager();
        $feeling = $em->getRepository('LcLcBundle:Feeling')->findOneByToken($feel);
        $check = $em->getRepository('LcLcBundle:Flike')->checkLiked($this->getUid(),$feeling);
        if(!$check){
			$entity->setStatus(1);
			$entity->setUser($this->getUid());
			$entity->setFeeling($feeling);
			$em->persist($entity);
			$em->flush();
		}else{
			($check->getStatus() == 1 ? $check->setStatus(0) : $check->setStatus(1));
			$em->persist($check);
			$em->flush();
		}
		if($page == 1)
		{
			return $this->redirect($this->generateUrl('feeling_show', array('token' => $feel)));
		} else 
		{
			return $this->redirect($this->generateUrl('feeling'));
		}
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
    
    public function getUid(){
		$usr= $this->get('security.context')->getToken()->getUser();
		$uid = $usr->getId();
		$em = $this->getDoctrine()->getManager();
		$userId = $em->getRepository('LcLcBundle:User')->find($uid);
		return $userId;
		
	}
}
