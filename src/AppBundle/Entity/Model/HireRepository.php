<?php

namespace AppBundle\Entity\Model;

use Doctrine\ORM\EntityRepository;

class HireRepository extends EntityRepository
{
    /**
     * Gets the Hire Id and retrieves their information
     *
     * @return integer
     */
    public function findHire($hire)
    {

        $sql = "
            SELECT 
            hire_id as id,
            customer.customer_id,
            customer.first_name,
            customer.last_name,
            salesperson.salesperson_id,
            car.car_registration,
            insurance_cover,
            rent_date,
            return_date,
            days_hired,
            car.car_price * days_hired as hire_price,
            hire_price,
            hire_price * 0.05 as total_wage,
            total_wage
            FROM hire
            LEFT JOIN customer on hire.customer_id = customer.customer_id
            LEFT JOIN salesperson on hire.salesperson_id = salesperson.salesperson_id
            LEFT JOIN car on hire.car_registration = car.car_registration
            
            WHERE hire_id = $hire
        ";

        $em = $this->getEntityManager();
        $query = $em->getConnection()->executeQuery($sql);

        return $query->fetch();
    }

    public function viewAllHires()
    {

        $sql = '
            SELECT 
            hire_id,
            customer.customer_id,
            customer.first_name,
            customer.last_name,
            salesperson.salesperson_id,
            car.car_registration,
            insurance_cover,
            rent_date,
            return_date,
            days_hired,
            car.car_price * days_hired as hire_price,
            hire_price,
            hire_price * 0.05 as total_wage,
            total_wage           
            FROM hire
            LEFT JOIN customer on hire.customer_id = customer.customer_id
            LEFT JOIN salesperson on hire.salesperson_id = salesperson.salesperson_id
            LEFT JOIN car on hire.car_registration = car.car_registration
        ';

        $em = $this->getEntityManager();
        $query = $em->getConnection()->executeQuery($sql);

        return $query->fetchAll();
    }

    public function updateHire($customerId, $carReg, $insuranceCover, $rentDate, $returnDate, $hireId)
    {

        $sql = '
            UPDATE hire h
              LEFT JOIN car car ON car.car_registration = h.car_registration
            SET
              h.customer_id = :customerId,
              h.car_registration = :carReg,
              h.insurance_cover = :insuranceCover,
              h.rent_date = :rentDate,
              h.return_date = :returnDate,
              h.days_hired = (DATEDIFF(h.return_date, h.rent_date) +1),
              h.hire_price = car.car_price * (DATEDIFF(h.return_date, h.rent_date) +1) + IF(:insuranceCover, 0, 60),
              h.total_wage = (hire_price * 0.05)
            WHERE hire_id = :hireId
        ';

        $em = $this->getEntityManager();
        $em->getConnection()->executeQuery($sql, [
                'hireId' => $hireId,
                'customerId' => $customerId,
                'carReg' => $carReg,
                'insuranceCover' => $insuranceCover,
                'rentDate' => date_format($rentDate, 'Y-m-d'),
                'returnDate' => date_format($returnDate, 'Y-m-d'),
            ]
        );
    }

    public function addNewHire($customerId, $carReg, $insuranceCover, $rentDate, $returnDate, $price)
    {

        $sql = '
            INSERT INTO hire (
              customer_id,
              car_registration,
              insurance_cover,
              rent_date,
              return_date,
              days_hired,
              hire_price,
              total_wage
            ) VALUES (
              :customerId,
              :carReg,
              :insuranceCover,
              :rentDate,
              :returnDate,
              (DATEDIFF(:returnDate, :rentDate) +1),
              (DATEDIFF(:returnDate, :rentDate) +1) * :carPrice + IF(:insuranceCover, 0, 60),
              (((DATEDIFF(:returnDate, :rentDate) +1) * :carPrice + IF(:insuranceCover, 0, 60)) * 0.05)
              )
        ';

        $em = $this->getEntityManager();
        $em->getConnection()->executeQuery($sql, [
                'customerId' => $customerId,
                'carReg' => $carReg,
                'insuranceCover' => $insuranceCover,
                'rentDate' => date_format($rentDate, 'Y-m-d'),
                'returnDate' => date_format($returnDate, 'Y-m-d'),
                'carPrice' => $price,
            ]
        );
    }

    public function deleteHire($hire)
    {

        $sql = "
            DELETE *
            FROM hire
            WHERE hire_id = '$hire'
        ";

        $em = $this->getEntityManager();
        $em->getConnection()->executeQuery($sql);
    }
}