<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Salesperson;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * A base template
     *
     * @Route("/", name="home")
     */
    public function indexAction(Request $request)
    {
        return $this->render(
            'default/index.html.twig', [

            ]
        );
    }
}
