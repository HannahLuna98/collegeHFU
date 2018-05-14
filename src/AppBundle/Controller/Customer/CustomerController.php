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
     * A base view for the Customer module
     *
     * @Route("/customer/", name="customer_index")
     */
    public function indexAction(Request $request)
    {
        return $this->render('default/Customer/customer.html.twig');
    }

    /**
     * A help guide focused on the customer module
     *
     * @Route("/customer/help", name="customer_help")
     */
    public function helpAction(Request $request)
    {
        return $this->render('default/Customer/customer_help.html.twig');
    }

    /**
     * A page that shows a list of all the customers
     *
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
     * A page that allows the user to add a new customer
     *
     * @Route("/customer/new", name="customer_new")
     */
    public function newAction(Request $request, $customer = null)
    {
        $em = $this->getDoctrine()->getManager();

        $repo = $em->getRepository(Customer::class);
        $form = $this->createForm(CustomerType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Load the form fields
            $firstName = $form->get('first_name')->getData();
            $lastName = $form->get('last_name')->getData();
            $street = $form->get('street')->getData();
            $city = $form->get('city')->getData();
            $postCode = $form->get('post_code')->getData();
            $mobile = $form->get('mobile')->getData();
            $email = $form->get('email')->getData();

            $repo->addNewCustomer($firstName, $lastName, $street, $city, $postCode, $mobile, $email);

            // Returns the user to the customer view page.
            return $this->redirectToRoute('customer_view');
        }

        return $this->render(
            'default/Customer/customer_new.html.twig', [
                'form' => $form->createView(),
                'customer' => $customer
            ]
        );
    }

    /**
     * A page that allows the user to edit an existing customer
     *
     * @Route("/customer/edit/{customer}", name="customer_edit")
     */
    public function editAction(Request $request, $customer)
    {
        // Get repository
        // Load customer entity from raw query based on id
        $em = $this->getDoctrine()->getManager();

        $repo = $em->getRepository(Customer::class);
        $customer = $repo->findCustomer($customer);

        $form = $this->createForm(CustomerType::class, $customer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $firstName = $form->get('first_name')->getData();
            $lastName = $form->get('last_name')->getData();
            $street = $form->get('street')->getData();
            $city = $form->get('city')->getData();
            $postCode = $form->get('post_code')->getData();
            $mobile = $form->get('mobile')->getData();
            $email = $form->get('email')->getData();

            $repo->updateCustomer($firstName, $lastName, $street, $city, $postCode, $mobile, $email, $customer['id']);

            return $this->redirectToRoute('customer_info', [
                    'customer' => $customer['id']
                ]
            );
        }

        return $this->render(
            'default/Customer/customer_edit.html.twig', [
                'form' => $form->createView(),
                'customer' => $customer,
            ]
        );
    }

    /**
     * A page that shows details of an individual customer
     *
     * @Route("/customer/info/{customer}", name="customer_info")
     */
    public function infoAction($customer)
    {
        $em = $this->getDoctrine()->getManager();

        $repo = $em->getRepository(Customer::class);
        $customer = $repo->findCustomer($customer);

        return $this->render('default/Customer/customer_info.html.twig', [
            'customer' => $customer
            ]
        );
    }
}
