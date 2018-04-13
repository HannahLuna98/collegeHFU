<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Customer Details
 *
 * @package Database
 * @ORM\Entity(repositoryClass="AppBundle\Entity\Model\CustomerRepository")
 * @ORM\Table(name="customer")
 */
class Customer
{
    /**
     * The primary identifier
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * Customer's First Name
     * @ORM\Column(type="varchar", length=35, name="first_name")
     * @Assert\Length(
     *     max = 35,
     *     min = 2,
     * )
     */
    protected $firstName;

    /**
     * Customer's Last Name
     * @ORM\Column(type="varchar", length=35, name="last_name")
     * @Assert\Length(
     *     max = 35,
     *     min = 2,
     * )
     */
    protected $lastName;

    /**
     * Customer's Street Address
     * @ORM\Column(type="varchar", length=35, name="street")
     * @Assert\Length(
     *     max = 35,
     *     min = 2,
     * )
     */
    protected $street;

    /**
     * Customer's City Address
     * @ORM\Column(type="varchar", length=35, name="city")
     * @Assert\Length(
     *     max = 35,
     *     min = 2,
     * )
     */
    protected $city;

    /**
     * Customer's Post Code
     * @ORM\Column(type="varchar", length=7, name="post_code")
     * @Assert\Length(
     *     max = 7,
     *     min = 5,
     * )
     */
    protected $postCode;

    /**
     * Customer's Mobile Number
     * @ORM\Column(type="varchar", length=11, name="mobile")
     * @Assert\Type(
     *     type="digit"
     * )
     */
    protected $mobile;

    /**
     * Customer's Email Address
     * @ORM\Column(type="varchar", length=50, name="email")
     * @Assert\Email()
     */
    protected $email;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Customer
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
     * @return Customer
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
     * @return Customer
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @param mixed $street
     * @return Customer
     */
    public function setStreet($street)
    {
        $this->street = $street;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     * @return Customer
     */
    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPostCode()
    {
        return $this->postCode;
    }

    /**
     * @param mixed $postCode
     * @return Customer
     */
    public function setPostCode($postCode)
    {
        $this->postCode = $postCode;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * @param mixed $mobile
     * @return Customer
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     * @return Customer
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }
}