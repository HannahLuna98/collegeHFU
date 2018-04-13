<?php

namespace AppBundle\Controller\Salesperson;

use AppBundle\Entity\Salesperson;
use AppBundle\Form\SalespersonType;
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

//    /**
//     * @Route("/salesperson/edit", name="salesperson_edit")
//     */
//    public function editAction(Request $request)
//    {
//        return $this->render('default/Salesperson/salesperson_edit.html.twig');
//    }

    /**
     * @Route("/salesperson/view", name="salesperson_view")
     */
    public function viewAction()
    {
        return $this->render(
            'default/Salesperson/salesperson_view.html.twig', [
                'salesperson' => 1
            ]
        );
    }

    /**
     * @Route("/salesperson/edit", name="salesperson_edit")
     */
    public function editAction(Request $request, Salesperson $salesperson)
    {
        $form = $this->createForm(SalespersonType::class, $salesperson);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($salesperson);
            $em->flush();
        }

        return $this->render(
            'default/Salesperson/salesperson_edit.html.twig', [
                'form' => $form->createView(),
                'salesperson' => $salesperson,
            ]
        );
    }
}
