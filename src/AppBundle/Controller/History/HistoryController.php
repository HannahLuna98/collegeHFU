<?php

namespace AppBundle\Controller\History;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class HistoryController extends Controller
{
    /**
     * @Route("/history", name="history_index")
     */
    public function indexAction(Request $request)
    {
        return $this->render('default/History/history.html.twig');
    }

    /**
     * @Route("/history/help", name="history_help")
     */
    public function helpAction(Request $request)
    {
        return $this->render('default/History/history_help.html.twig');
    }

    /**
     * @Route("/history/view", name="history_view")
     */
    public function viewAction(Request $request)
    {
        return $this->render('default/History/history_view.html.twig');
    }
}
