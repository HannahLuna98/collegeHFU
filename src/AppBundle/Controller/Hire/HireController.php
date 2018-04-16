<?php

namespace AppBundle\Controller\Hire;

use AppBundle\Entity\Hire;
use AppBundle\Form\HireType;
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
     * @Route("/hire/view/", name="hire_view")
     */
    public function viewAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository(Hire::class);

        return $this->render('default/Hire/hire_view.html.twig', [
                'hires' => $repo->viewAllHires()
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
     * @Route("/hire/edit/{hire}", name="hire_edit")
     */
    public function editAction(Request $request, $hire)
    {
        // Get repository
        // Load hire entity from raw query based on id
        $em = $this->getDoctrine()->getManager();

        $repo = $em->getRepository(Hire::class);
        $hire = $repo->findHire($hire);

        $form = $this->createForm(HireType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $customerId = $form->get('customer_id')->getData();
            $carReg = $form->get('car_registration')->getData();
            $insuranceCover = $form->get('insurance_cover')->getData();
            $rentDate = $form->get('rent_date')->getData();
            $returnDate = $form->get('return_date')->getData();
            $daysHired = $form->get('days_hired')->getData();

            $repo->updateCustomer($customerId, $carReg, $insuranceCover, $rentDate, $returnDate, $daysHired, $hire['id']);
        }

        return $this->render('default/Hire/hire_edit.html.twig', [
                'form' => $form->createView(),
                'hire' => $hire,
            ]
        );
    }

    /**
     * @Route("/hire/info/{hire}", name="hire_info")
     */
    public function infoAction($hire)
    {
        $em = $this->getDoctrine()->getManager();

        $repo = $em->getRepository(Hire::class);
        $hire = $repo->findHire($hire);

        return $this->render('default/Hire/hire_info.html.twig', [
            'hire' => $hire
            ]
        );
    }
}
