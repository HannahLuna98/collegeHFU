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
            hire_price
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
            hire_price           
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
            UPDATE hire
            SET 
            customer_id = :customerId,
            car_registration = :carReg,
            insurance_cover = :insuranceCover,
            rent_date = :rentDate,
            return_date = :returnDate,
            days_hired = DATEDIFF(return_date, rent_date)
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

    public function addNewHire($customerId, $carReg, $insuranceCover, $rentDate, $returnDate)
    {

        $sql = '
            INSERT INTO hire (
              customer_id,
              car_registration,
              insurance_cover,
              rent_date,
              return_date,
              days_hired = DATEDIFF(return_date, rent_date)
            ) VALUES (
              :customerId,
              :carReg,
              :insuranceCover,
              :rentDate,
              :returnDate)
        ';

        $em = $this->getEntityManager();
        $em->getConnection()->executeQuery($sql, [
                'customerId' => $customerId,
                'carReg' => $carReg,
                'insuranceCover' => $insuranceCover,
                'rentDate' => date_format($rentDate, 'Y-m-d'),
                'returnDate' => date_format($returnDate, 'Y-m-d'),
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