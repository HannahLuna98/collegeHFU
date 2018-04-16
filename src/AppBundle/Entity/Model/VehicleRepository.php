<?php

namespace AppBundle\Entity\Model;

use Doctrine\ORM\EntityRepository;

class VehicleRepository extends EntityRepository
{
    /**
     * Gets the Vehicle Id and retrieves their information
     *
     *
     */
    public function findVehicle($vehicle) {

        $sql = "
            SELECT
            car_registration as id,
            make,
            model,
            colour,
            capacity,
            car_price,
            car_available
            FROM car
            WHERE car_registration = '$vehicle'
        ";

        $em = $this->getEntityManager();
        $query = $em->getConnection()->executeQuery($sql);

        return $query->fetch();
    }

    public function viewAllVehicles() {

        $sql = '
            SELECT 
            car_registration,
            make,
            model,
            colour,
            capacity,
            car_price,
            car_available
            FROM car
        ';

        $em = $this->getEntityManager();
        $query = $em->getConnection()->executeQuery($sql);

        return $query->fetchAll();
    }

    public function updateVehicle($available, $price, $carReg) {

        $sql = '
            UPDATE car
            SET 
             car_available = :available,
             car_price = :price

            WHERE car_registration = :car_registration
        ';

        $em = $this->getEntityManager();
        $em->getConnection()->executeQuery($sql, [
                'car_registration' => $carReg,
                'available' => $available,
                'price' => $price
            ]
        );
    }

    public function addNewVehicle($carReg, $make, $model, $colour, $capacity, $price, $available) {

        $sql = '
            INSERT INTO car (
              car_registration,
              make,
              model,
              colour,
              capacity,
              car_price,
            ) VALUES (
              :carReg,
              :make,
              :model,
              :colour,
              :capacity,
              :price
              )
        ';

        $em = $this->getEntityManager();
        $em->getConnection()->executeQuery($sql, [
                'carReg' => $carReg,
                'make' => $make,
                'model' => $model,
                'colour' => $colour,
                'capacity' => $capacity,
                'price' => $price,
                'available' => $available,
            ]
        );
    }

    public function deleteVehicle($vehicle) {

        $sql = "
            DELETE *
            FROM car
            WHERE car_registration = '$vehicle'
        ";

        $em = $this->getEntityManager();
        $em->getConnection()->executeQuery($sql);
    }
}