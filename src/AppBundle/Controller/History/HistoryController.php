<?php

namespace AppBundle\Controller\History;

use AppBundle\Entity\Hire;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class HistoryController extends Controller
{
    /**
     * A base view for the History module
     *
     * @Route("/history", name="history_index")
     */
    public function indexAction(Request $request)
    {
        return $this->render('default/History/history.html.twig');
    }

    /**
     * A help guide focused on the history module
     *
     * @Route("/history/help", name="history_help")
     */
    public function helpAction(Request $request)
    {
        return $this->render('default/History/history_help.html.twig');
    }

    /**
     * A page that shows a list of all the invoices
     *
     * @Route("/history/view", name="history_view")
     */
    public function viewAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository(Hire::class);

        return $this->render('default/History/history_view.html.twig', [
                'hires' => $repo->viewAllHires()
            ]
        );
    }
}
