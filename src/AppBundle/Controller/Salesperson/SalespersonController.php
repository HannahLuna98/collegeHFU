<?php

namespace AppBundle\Controller\Salesperson;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SalespersonController extends Controller
{
    /**
     * @Route("/salesperson/", name="salesperson_index")
     */
    public function indexAction(Request $request)
    {
        return $this->render('default/Salesperson/salesperson.html.twig');
    }

    /**
     * @Route("/salesperson/help", name="salesperson_help")
     */
    public function helpAction(Request $request)
    {
        return $this->render('default/Salesperson/salesperson_help.html.twig');
    }

    /**
     * @Route("/salesperson/view", name="salesperson_view")
     */
    public function viewAction(Request $request)
    {
        return $this->render('default/Salesperson/salesperson_view.html.twig');
    }

    /**
     * @Route("/salesperson/edit", name="salesperson_edit")
     */
    public function editAction(Request $request)
    {
        return $this->render('default/Salesperson/salesperson_edit.html.twig');
    }
}
