<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Customer Details
 *
 * @package Database
 * @ORM\Entity(repositoryClass="AppBundle\Entity\Model\SalespersonRepository")
 * @ORM\Table(name="salesperson")
 */
class Salesperson
{
    /**
     * The primary identifier
     *
     * @ORM\Id
     * @ORM\Column(type="integer", name="salesperson_id")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * Customer's First Name
     * @ORM\Column(type="string", length=35, name="first_name")
     * @Assert\Length(
     *     max = 35,
     *     min = 2,
     * )
     */
    protected $firstName;

    /**
     * Customer's Last Name
     * @ORM\Column(type="string", length=35, name="last_name")
     * @Assert\Length(
     *     max = 35,
     *     min = 2,
     * )
     */
    protected $lastName;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Salesperson
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     * @return Salesperson
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     * @return Salesperson
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }
}

