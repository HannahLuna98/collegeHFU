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
    public function findHire($hire) {

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

    public function viewAllHires() {

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

    public function updateHire($customerId, $firstName, $lastName, $carReg, $insuranceCover, $rentDate, $returnDate, $daysHired, $hireId) {

        $sql = "
            UPDATE hire
            SET 
            customer.customer_id = :customerId,
            customer.first_name = :firstName,
            customer.last_name = :lastName,
            car.car_registration = :carReg,
            insurance_cover = :insuranceCover,
            rent_date = :rentDate,
            return_date = :returnDate,
            days_hired = :daysHired           
            FROM hire
            LEFT JOIN customer on hire.customer_id = customer.customer_id
            LEFT JOIN salesperson on hire.salesperson_id = salesperson.salesperson_id
            LEFT JOIN car on hire.car_registration = car.car_registration

            WHERE hire_id = $hireId
        ";

        $em = $this->getEntityManager();
        $em->getConnection()->executeQuery($sql, [
                'customerId' => $customerId,
                'firstName' => $firstName,
                'lastName' => $lastName,
                'carReg' => $carReg,
                'insuranceCover' => $insuranceCover,
                'rentDate' => $rentDate,
                'returnDate' => $returnDate,
                'daysHired' => $daysHired,
            ]
        );
    }

    public function addNewHire($customerId, $salespersonId, $carReg, $insuranceCover, $rentDate, $returnDate, $daysHired) {

        $sql = '
            INSERT INTO hire (
              customer_id,
              salesperson_id,
              car_registration,
              insurance_cover,
              rent_date,
              return_date,
              days_hired,              
            ) VALUES (
              :customerId,
              :salespersonId,
              :carReg,
              :insuranceCover,
              :rentDate,
              :returnDate,
              :daysHired
            )
        ';

        $em = $this->getEntityManager();
        $em->getConnection()->executeQuery($sql, [
                'customerId' => $customerId,
                'salespersonId' => $salespersonId,
                'carReg' => $carReg,
                'insuranceCover' => $insuranceCover,
                'rentDate' => $rentDate,
                'returnDate' => $returnDate,
                'daysHired' => $daysHired,
            ]
        );
    }

    public function deleteHire($hire) {

        $sql = "
            DELETE *
            FROM hire
            WHERE hire_id = '$hire'
        ";

        $em = $this->getEntityManager();
        $em->getConnection()->executeQuery($sql);
    }
}