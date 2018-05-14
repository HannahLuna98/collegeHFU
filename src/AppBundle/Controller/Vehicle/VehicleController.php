<?php

namespace AppBundle\Controller\Vehicle;

use AppBundle\Entity\Vehicle;
use AppBundle\Form\VehicleType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class VehicleController extends Controller
{
    /**
     * A base view for the Vehicle module
     *
     * @Route("/vehicle", name="vehicle_index")
     */
    public function indexAction(Request $request)
    {
        return $this->render('default/Vehicle/vehicle.html.twig');
    }

    /**
     * A help guide focused on the vehicle module
     *
     * @Route("/vehicle/help", name="vehicle_help")
     */
    public function helpAction(Request $request)
    {
        return $this->render('default/Vehicle/vehicle_help.html.twig');
    }

    /**
     * A page that shows a list of all the vehicles
     *
     * @Route("/vehicle/view", name="vehicle_view")
     */
    public function viewAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository(Vehicle::class);

        return $this->render('default/Vehicle/vehicle_view.html.twig', [
                'vehicles' => $repo->viewAllVehicles()
            ]
        );
    }

    /**
     * A page that allows the user to edit an existing vehicle
     *
     * @Route("/vehicle/edit/{vehicle}", name="vehicle_edit")
     */
    public function editAction(Request $request, $vehicle)
    {
        // Get repository
        // Load vehicle entity from raw query based on id
        $em = $this->getDoctrine()->getManager();

        $repo = $em->getRepository(Vehicle::class);
        $vehicle = $repo->findVehicle($vehicle);

        $form = $this->createForm(VehicleType::class, $vehicle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $available = $form->get('car_available')->getData();
            $price = $form->get('car_price')->getData();

            $repo->updateVehicle($available, $price, $vehicle['car_registration']);

            return $this->redirectToRoute('vehicle_info', [
                    'vehicle' => $vehicle['car_registration']
                ]
            );
        }

        return $this->render('default/Vehicle/vehicle_edit.html.twig', [
            'form' => $form->createView(),
            'vehicle' => $vehicle,
            ]
        );
    }

    /**
     * A page that allows the user to add a new vehicle
     *
     * @Route("/vehicle/new/", name="vehicle_new")
     */
    public function newAction(Request $request, $vehicle = null)
    {
        $em = $this->getDoctrine()->getManager();

        $repo = $em->getRepository(Vehicle::class);
        $form = $this->createForm(VehicleType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $carReg = $form->get('car_registration')->getData();
            $make = $form->get('make')->getData();
            $model = $form->get('model')->getData();
            $colour = $form->get('colour')->getData();
            $capacity = $form->get('capacity')->getData();
            $price = $form->get('car_price')->getData();
            $available = $form->get('car_available')->getData();

            $repo->addNewVehicle($carReg, $make, $model, $colour, $capacity, $price, $available);

            return $this->redirectToRoute('vehicle_view');
        }

        return $this->render('default/Vehicle/vehicle_new.html.twig', [
                'form' => $form->createView(),
                'vehicle' => $vehicle
            ]
        );
    }

    /**
     * A page that shows details of an individual vehicle
     *
     * @Route("/vehicle/info/{vehicle}/", name="vehicle_info")
     */
    public function infoAction($vehicle)
    {
        $em = $this->getDoctrine()->getManager();

        $repo = $em->getRepository(Vehicle::class);
        $vehicle = $repo->findVehicle($vehicle);

        return $this->render('default/Vehicle/vehicle_info.html.twig', [
            'vehicle' => $vehicle
            ]
        );
    }
}
