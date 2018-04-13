<?php

namespace AppBundle\Controller\Graph;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class GraphController extends Controller
{
    /**
     * @Route("/graph/", name="graph_index")
     */
    public function indexAction(Request $request)
    {
        return $this->render('default/Graph/graph.html.twig');
    }

    /**
     * @Route("/graph/view", name="graph_view")
     */
    public function viewAction(Request $request)
    {
        return $this->render('default/Graph/graph_view.html.twig');
    }
}
