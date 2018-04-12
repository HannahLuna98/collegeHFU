<?php

namespace AppBundle\Entity\Model;

use Doctrine\ORM\EntityRepository;

class CustomerRepository extends EntityRepository
{
    /**
     * Gets the Customer Id and retrieves their information
     *
     * @return integer
     */
    public function findCustomer($customer) {

        $sql = "
            SELECT 
            customer_id as id,
            first_name,
            last_name,
            street,
            city,
            post_code,
            mobile,
            email
            FROM customer
            WHERE customer_id = $customer
        ";

        $em = $this->getEntityManager();
        $query = $em->getConnection()->executeQuery($sql);

        return $query->fetch();
    }

    public function viewAllCustomers() {

        $sql = '
            SELECT 
            customer_id as id,
            first_name,
            last_name,
            street,
            city,
            post_code,
            mobile,
            email
            FROM customer
        ';

        $em = $this->getEntityManager();
        $query = $em->getConnection()->executeQuery($sql);

        return $query->fetchAll();
    }

    public function updateCustomer($firstName, $lastName, $street, $city, $postcode, $mobile, $email,  $id) {

        $sql = "
            UPDATE customer
            SET first_name = :firstName,
             last_name = :lastName,
             street = :street,
             city = :city,
             post_code = :postcode,
             mobile = :mobile,
             email = :email
            WHERE customer_id = $id
        ";

        $em = $this->getEntityManager();
        $em->getConnection()->executeQuery($sql, [
                'firstName' => $firstName,
                'lastName' => $lastName,
                'street' => $street,
                'city' => $city,
                'postcode' => $postcode,
                'mobile' => $mobile,
                'email' => $email,
            ]
        );
    }

    public function addNewCustomer($firstName, $lastName, $street, $city, $postcode, $mobile, $email) {

        $sql = '
            INSERT INTO customer (
              first_name,
              last_name,
              street,
              city,
              post_code,
              mobile,
              email
            ) VALUES (
              :firstName,
              :lastName,
              :street,
              :city,
              :postcode,
              :mobile,
              :email)
        ';

        $em = $this->getEntityManager();
        $em->getConnection()->executeQuery($sql, [
                'firstName' => $firstName,
                'lastName' => $lastName,
                'street' => $street,
                'city' => $city,
                'postcode' => $postcode,
                'mobile' => $mobile,
                'email' => $email,
            ]
        );
    }

    public function deleteCustomer($customer) {

        $sql = "
            DELETE *
            FROM customer
            WHERE customer_id = '$customer'
        ";

        $em = $this->getEntityManager();
        $em->getConnection()->executeQuery($sql);
    }
}