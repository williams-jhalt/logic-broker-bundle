<?php

namespace Williams\LogicBrokerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/logicbroker/orderstatus")
 */
class OrderStatusController extends Controller {
    
    /**
     * @Route("/", name="logicbroker_orderstatus_index")
     */
    public function indexAction() {
        return $this->redirectToRoute('logicbroker_orderstatus_list');
    }

    /**
     * @Route("/list", name="logicbroker_orderstatus_list")
     */
    public function listAction(Request $request) {

        $orderStatuses = $this->getDoctrine()->getRepository('Williams\LogicBrokerBundle\Entity\OrderStatus')->findAll();

        return $this->render('@WilliamsLogicBroker/orderstatus/list.html.twig', [
            'items' => $orderStatuses
        ]);
    }

    /**
     * @Route("/view/{id}", name="logicbroker_orderstatus_view")
     */
    public function viewAction($id, Request $request) {

        $status = $this->getDoctrine()->getRepository('Williams\LogicBrokerBundle\Entity\OrderStatus')->find($id);

        return $this->render('@WilliamsLogicBroker/orderstatus/view.html.twig', [
                    'item' => $status
        ]);
    }

}
