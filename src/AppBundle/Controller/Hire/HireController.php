<?php

namespace AppBundle\Controller\Hire;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class HireController extends Controller
{
    /**
     * @Route("/hire/", name="hire_index")
     */
    public function indexAction(Request $request)
    {
        return $this->render('default/Hire/hire.html.twig');
    }

    /**
     * @Route("/hire/help", name="hire_help")
     */
    public function helpAction(Request $request)
    {
        return $this->render('default/Hire/hire_help.html.twig');
    }

    /**
     * @Route("/hire/view", name="hire_view")
     */
    public function viewAction(Request $request)
    {
        return $this->render('default/Hire/hire_view.html.twig', [
            'salesperson' => 1
            ]
        );
    }

    /**
     * @Route("/hire/new", name="hire_new")
     */
    public function newAction(Request $request)
    {
        return $this->render('default/Hire/hire_new.html.twig');
    }

    /**
     * @Route("/hire/edit", name="hire_edit")
     */
    public function editAction(Request $request)
    {
        return $this->render('default/Hire/hire_edit.html.twig');
    }

    /**
     * @Route("/hire/info", name="hire_info")
     */
    public function infoAction(Request $request)
    {
        return $this->render('default/Hire/hire_info.html.twig');
    }
}
