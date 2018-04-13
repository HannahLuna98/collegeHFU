<?php

namespace AppBundle\Entity\Model;

use Doctrine\ORM\EntityRepository;

class SalespersonRepository extends EntityRepository
{
    /**
     * Gets the salesperson Id and retrieves their name
     *
     * @return integer
     */
    public function findSalesperson($salesperson) {


        $sql = "
            SELECT 
            salesperson_id as id,
            first_name,
            last_name,
            commission,
            total_wage
            FROM salesperson
            WHERE salesperson_id = $salesperson
        ";

        $em = $this->getEntityManager();
        $query = $em->getConnection()->executeQuery($sql);

        return $query->fetch();
    }

    public function updateSalesperson($firstName, $lastName, $id) {

        $sql = "
            UPDATE salesperson
            SET first_name = :firstName,
            last_name = :lastName
            WHERE salesperson_id = :id
        ";

        $em = $this->getEntityManager();
        $em->getConnection()->executeQuery($sql, [
            'firstName' => $firstName,
            'lastName'  => $lastName,
            'id' => $id,
            ]
        );
    }
}