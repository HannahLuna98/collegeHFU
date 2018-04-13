<?php

namespace AppBundle\Controller\Vehicle;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class VehicleController extends Controller
{
    /**
     * @Route("/vehicle", name="vehicle_index")
     */
    public function indexAction(Request $request)
    {
        return $this->render('default/Vehicle/vehicle.html.twig');
    }

    /**
     * @Route("/vehicle/help", name="vehicle_help")
     */
    public function helpAction(Request $request)
    {
        return $this->render('default/Vehicle/vehicle_help.html.twig');
    }

    /**
     * @Route("/vehicle/view", name="vehicle_view")
 */
    public function viewAction(Request $request)
    {
        return $this->render('default/Vehicle/vehicle_view.html.twig', [
            'salesperson' => 1
            ]
        );
    }


    /**
     * @Route("/vehicle/edit", name="vehicle_edit")
     */
    public function editAction(Request $request)
    {
        return $this->render('default/Vehicle/vehicle_edit.html.twig');
    }

    /**
     * @Route("/vehicle/new", name="vehicle_new")
     */
    public function newAction(Request $request)
    {
        return $this->render('default/Vehicle/vehicle_new.html.twig');
    }

    /**
     * @Route("/vehicle/info", name="vehicle_info")
     */
    public function infoAction(Request $request)
    {
        return $this->render('default/Vehicle/vehicle_info.html.twig');
    }
}
