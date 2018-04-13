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

    /**
     * @Route("/salesperson/view/{salesperson}", name="salesperson_view")
     */
    public function viewAction(Salesperson $salesperson)
    {
        return $this->render(
            'default/Salesperson/salesperson_view.html.twig', [
                'salesperson' => $salesperson
            ]
        );
    }

    /**
     * @Route("/salesperson/edit/{salesperson}", name="salesperson_edit")
     */
    public function editAction(Request $request, $salesperson)
    {
        // Get repository
        // Load salesperson entity from raw query based on id
        $em = $this->getDoctrine()->getManager();

        $repo = $em->getRepository(Salesperson::class);
        $salesperson = $repo->findSalesPerson($salesperson);

        $form = $this->createForm(SalespersonType::class, $salesperson);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $firstName = $form->get('firstName')->getData();
            $lastName = $form->get('lastName')->getData();

            $repo->updateSalesperson($firstName, $lastName, $salesperson['id']);
        }

        return $this->render(
            'default/Salesperson/salesperson_edit.html.twig', [
                'form' => $form->createView(),
                'salesperson' => $salesperson,
            ]
        );
    }
}
