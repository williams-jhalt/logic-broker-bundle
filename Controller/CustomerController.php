<?php

namespace Williams\LogicBrokerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Route;
use Williams\LogicBrokerBundle\Entity\Customer;

/**
 * @Route("/logicbroker/customer")
 */
class CustomerController extends Controller {    
    
    /**
     * @Route("/", name="logicbroker_customer_index")
     */
    public function indexAction() {
        return $this->redirectToRoute('logicbroker_customer_list');
    }

    /**
     * @Route("/list", name="logicbroker_customer_list")
     */
    public function listAction() {
        
        $customers = $this->getDoctrine()->getRepository('Williams:LogicBrokerBundle:Customer')->findAll();

        return $this->render('@WilliamsLogicBroker/customer/list.html.twig', [
                    'items' => $customers
        ]);
    }

    /**
     * @Route("/new", name="logicbroker_customer_new")
     */
    public function newAction(Request $request) {

        $customer = new Customer();

        $form = $this->createForm(CustomerType::class, $customer);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($customer);
            $em->flush();
            return $this->redirectToRoute('logicbroker_customer_view', ['id' => $customer->getId()]);
        }

        return $this->render('@WilliamsLogicBroker/customer/new.html.twig', [
                    'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/view/{id}", name="logicbroker_customer_view")
     */
    public function viewAction($id, Request $request) {

        $product = $this->getDoctrine()->getRepository('Williams:LogicBrokerBundle:Customer')->find($id);

        return $this->render('@WilliamsLogicBroker/customer/view.html.twig', [
                    'item' => $product
        ]);
    }

    /**
     * @Route("/edit/{id}", name="logicbroker_customer_edit")
     */
    public function editAction($id, Request $request) {

        $customer = $this->getDoctrine()->getRepository('Williams:LogicBrokerBundle:Customer')->find($id);

        $form = $this->createForm(CustomerType::class, $customer);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($customer);
            $em->flush();
            return $this->redirectToRoute('logicbroker_customer_view', ['id' => $customer->getId()]);
        }

        return $this->render('@WilliamsLogicBroker/customer/edit.html.twig', [
                    'form' => $form->createView(),
                    'item' => $customer
        ]);
    }

    /**
     * @Route("/delete/{id}", name="logicbroker_customer_delete")
     */
    public function deleteAction($id, Request $request) {

        $customer = $this->getDoctrine()->getRepository('Williams:LogicBrokerBundle:Customer')->find($id);

        $form = $this->createFormBuilder()
                ->add('confirm', SubmitType::class, ['label' => 'Confirm Delete'])
                ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            $em->delete($customer);
            $em->flush();
            return $this->redirectToRoute('logicbroker_customer_list');
        }

        return $this->render('@WilliamsLogicBroker/customer/delete.html.twig', [
                    'form' => $form->createView(),
                    'item' => $customer
        ]);
    }

}
