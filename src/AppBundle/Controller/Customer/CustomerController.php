<?php

namespace AppBundle\Controller\Customer;

use AppBundle\Entity\Customer;
use AppBundle\Form\CustomerType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CustomerController extends Controller
{
    /**
     * @Route("/customer/", name="customer_index")
     */
    public function indexAction(Request $request)
    {
        return $this->render('default/Customer/customer.html.twig');
    }

    /**
     * @Route("/customer/help", name="customer_help")
     */
    public function helpAction(Request $request)
    {
        return $this->render('default/Customer/customer_help.html.twig');
    }

    /**
     * @Route("/customer/view/", name="customer_view")
     */
    public function viewAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository(Customer::class);

        return $this->render('default/Customer/customer_view.html.twig', [
                'customers' => $repo->viewAllCustomers()
            ]
        );
    }

    /**
     * @Route("/customer/new", name="customer_new")
     */
    public function newAction(Request $request)
    {
        return $this->render('default/Customer/customer_new.html.twig');
    }

    /**
     * @Route("/customer/edit/{customer}", name="customer_edit")
     */
    public function editAction(Request $request, Customer $customer)
    {
        // Get repository
        // Load custoemr entity from raw query based on id
        $em = $this->getDoctrine()->getManager();

        $repo = $em->getRepository(Customer::class);
        $customer = $repo->findCustomer($customer);

        $form = $this->createForm(CustomerType::class, $customer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $firstName = $form->get('firstName')->getData();
            $lastName = $form->get('lastName')->getData();
            $street = $form->get('street')->getData();
            $city = $form->get('city')->getData();
            $postcode = $form->get('postcode')->getData();
            $mobile = $form->get('mobile')->getData();
            $email = $form->get('email')->getData();

            $repo->updateCustomer($firstName, $lastName, $street, $city, $postcode, $mobile, $email, $customer['id']);
        }

        return $this->render(
            'default/Customer/customer_edit.html.twig', [
                'form' => $form->createView(),
                'customer' => $customer,
            ]
        );
    }

    /**
     * @Route("/customer/info/{customer}", name="customer_info")
     */
    public function infoAction(Request $request, Customer $customer)
    {
        return $this->render('default/Customer/customer_info.html.twig', [
            'customer' => $customer
            ]
        );
    }
}
