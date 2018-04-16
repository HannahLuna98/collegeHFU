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
            car_registration,
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
            car.car_registration,
            make,
            model,
            colour,
            capacity,
            car_price,
            car_available,
            IF(hire.rent_date < NOW() AND hire.return_date > NOW(), 1, 0) as booked
            FROM car
            LEFT JOIN hire ON hire.car_registration = car.car_registration
        ';

        $em = $this->getEntityManager();
        $query = $em->getConnection()->executeQuery($sql);

        return $query->fetchAll();
    }

    public function updateVehicle($available, $price, $carReg) {

        $sql = "
            UPDATE car
            SET 
             car_available = :available,
             car_price = :price

            WHERE car_registration = '$carReg'
        ";

        $em = $this->getEntityManager();
        $em->getConnection()->executeQuery($sql, [
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
              car_available
            ) VALUES (
              :carReg,
              :make,
              :model,
              :colour,
              :capacity,
              :price,
              :available)
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

    public function isVehicleAvailableBetween($carReg, $rentDate, $returnDate)
    {
        $sql = '
            SELECT *
            FROM hire h
            WHERE h.car_registration = :car_registration
            AND (
              DATE(date_from) <= :date_from AND DATE(date_to) >= :date_to
              OR DATE(date_from) >= :date_from AND DATE(date_to) <= :date_to 
              OR DATE(date_from) BETWEEN :date_from AND :date_to
              OR DATE(date_to) BETWEEN :date_from AND :date_to
            )               
        ';

        $em = $this->getEntityManager();
        $em->getConnection()->executeQuery($sql, [
                'car_registration' => $carReg,
                ''
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