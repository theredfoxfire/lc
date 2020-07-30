<?php

namespace Lc\LcBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Lc\LcBundle\Entity\Orderan;
use Lc\LcBundle\Form\OrderanType;

/**
 * Orderan controller.
 *
 */
class OrderanController extends Controller
{

    /**
     * Lists all Orderan entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('LcLcBundle:Orderan')->findAll();

        return $this->render('LcLcBundle:Orderan:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Orderan entity.
     *
     */
    public function createAction(Request $request, $token)
    {
        $em = $this->getDoctrine()->getManager();
        $feeling = $em->getRepository('LcLcBundle:Feeling')->findOneByToken($token);
        $c = $em->getRepository('LcLcBundle:Feeling')->countUserFeeling();
        if (!$feeling) {
            throw $this->createNotFoundException('Unable to find Feeling entity.');
        }
        $entity = new Orderan();
        $form = $this->createCreateForm($entity, $token);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $deliveryDate = date_create_from_format('Y-m-d', $entity->getDeliveryDate());
            $phoneWa = substr_replace($entity->getPhoneWa(), "62", 0, 1);
            $apiToken = $this->container->getParameter('telegram_bot');
            $textMessage = "Hello mimin Maztah, ada orderan baru melalui PradisteApp dari kak: ".$entity->getDeliveryName();
            $textMessage .= "\nKirimi dia chat WhatsApp dengan klik link ini https://api.whatsapp.com/send?phone=".$phoneWa.'&text=Hai%20kak%20'.$entity->getDeliveryName();
            $textMessage .= "\n \nDetail Pesanan:";
            $textMessage .= "\nProduct: ".strip_tags($feeling->getFeel());
            $textMessage .= "\n \nAlamat Pengiriman: ".$entity->getAddress();
            $textMessage .= "\n \nTanggal Pengiriman: ".date_format($deliveryDate, 'd-m-Y');
            $textMessage .= "\n \nCatatan tambahan: ".$entity->getNote();
            $data = [
                'chat_id' => '@Maztah',
                'text' => $textMessage,
            ];

            $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data) );
            $entity->setStatus(1);
            $entity->setProduct($feeling->getFeel());
            $entity->setOrderStatus(0);
            $entity->setPaymentStatus(0);
            $entity->setPaymentDp(0);
            $entity->setFeeling($feeling);
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('orderan_show', array('id' => $entity->getToken())));
        }

        return $this->render('LcLcBundle:Orderan:new.html.twig', array(
            'entity' => $feeling,
            'others' => array(),
            'form'   => $form->createView(),
            'fall' => array(),
            'chat' => array(),
            'notify' => array(),
            'page' => $_GET['page'] ?? 1,
            'c' => $c,
        ));
    }

    /**
     * Creates a form to create a Orderan entity.
     *
     * @param Orderan $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Orderan $entity, $token)
    {
        $form = $this->createForm(new OrderanType(), $entity, array(
            'action' => $this->generateUrl('orderan_create', array('token' => $token)),
            'method' => 'POST',
        ));

        return $form;
    }

    /**
     * Displays a form to create a new Orderan entity.
     *
     */
    public function newAction($token)
    {
        $entity = new Orderan();
        $em = $this->getDoctrine()->getManager();
        $form   = $this->createCreateForm($entity, $token);
        $c = $em->getRepository('LcLcBundle:Feeling')->countUserFeeling();
        $feeling = $em->getRepository('LcLcBundle:Feeling')->findOneByToken($token);
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Feeling entity.');
        }

        return $this->render('LcLcBundle:Orderan:new.html.twig', array(
            'entity' => $feeling,
            'others' => array(),
            'form'   => $form->createView(),
            'fall' => array(),
            'chat' => array(),
            'notify' => array(),
            'page' => $_GET['page'] ?? 1,
            'c' => $c,
        ));
    }

    /**
     * Finds and displays a Orderan entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LcLcBundle:Orderan')->findOneByToken($id);
        $c = $em->getRepository('LcLcBundle:Feeling')->countUserFeeling();

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Orderan entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('LcLcBundle:Orderan:show.html.twig', array(
            'entity'      => $entity,
            'others' => array(),
            'fall' => array(),
            'chat' => array(),
            'notify' => array(),
            'page' => $_GET['page'] ?? 1,
            'c' => $c,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Orderan entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LcLcBundle:Orderan')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Orderan entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('LcLcBundle:Orderan:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Orderan entity.
    *
    * @param Orderan $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Orderan $entity)
    {
        $form = $this->createForm(new OrderanType(), $entity, array(
            'action' => $this->generateUrl('orderan_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Orderan entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LcLcBundle:Orderan')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Orderan entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('orderan_edit', array('id' => $id)));
        }

        return $this->render('LcLcBundle:Orderan:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Orderan entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('LcLcBundle:Orderan')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Orderan entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('orderan'));
    }

    /**
     * Creates a form to delete a Orderan entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('orderan_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
