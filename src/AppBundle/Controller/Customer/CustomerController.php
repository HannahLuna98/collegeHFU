<?php

namespace AppBundle\Controller\Customer;

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
     * @Route("/customer/view", name="customer_view")
     */
    public function viewAction(Request $request)
    {
        return $this->render('default/Customer/customer_view.html.twig', [
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
     * @Route("/customer/edit", name="customer_edit")
     */
    public function editAction(Request $request)
    {
        return $this->render('default/Customer/customer_edit.html.twig');
    }

    /**
     * @Route("/customer/info", name="customer_info")
     */
    public function infoAction(Request $request)
    {
        return $this->render('default/Customer/customer_info.html.twig');
    }
}
