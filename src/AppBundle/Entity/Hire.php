<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Customer Details
 *
 * @package Database
 * @ORM\Entity(repositoryClass="AppBundle\Entity\Model\HireRepository")
 * @ORM\Table(name="hire")
 */
class Hire
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
     * @ORM\Column(type="boolean", name="insurance_cover")
     */
    protected $insuranceCover;

    /**
     * @ORM\Column(type="datetime", name="rent_date")
     * @Assert\DateTime()
     */
    protected $rentDate;

    /**
     * @ORM\Column(type="datetime", name="return_date")
     * @Assert\DateTime()
     */
    protected $returnDate;

    /**
     * @ORM\Column(type="integer", name="days_hired")
     */
    protected $daysHired;

    /**
     * @ORM\ManyToOne(targetEntity="Customer")
     * @ORM\JoinColumn(name="customer_id", referencedColumnName="customer_id")
     */
    protected $customer;

    /**
     * @ORM\ManyToOne(targetEntity="Salesperson")
     * @ORM\JoinColumn(name="salesperson_id", referencedColumnName="salesperson_id")
     */
    protected $salesperson;

    /**
     * @ORM\ManyToOne(targetEntity="Vehicle")
     * @ORM\JoinColumn(name="car_registration", referencedColumnName="car_registration")
     */
    protected $carReg;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Hire
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getInsuranceCover()
    {
        return $this->insuranceCover;
    }

    /**
     * @param mixed $insuranceCover
     * @return Hire
     */
    public function setInsuranceCover($insuranceCover)
    {
        $this->insuranceCover = $insuranceCover;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRentDate()
    {
        return $this->rentDate;
    }

    /**
     * @param mixed $rentDate
     * @return Hire
     */
    public function setRentDate($rentDate)
    {
        $this->rentDate = $rentDate;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getReturnDate()
    {
        return $this->returnDate;
    }

    /**
     * @param mixed $returnDate
     * @return Hire
     */
    public function setReturnDate($returnDate)
    {
        $this->returnDate = $returnDate;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDaysHired()
    {
        return $this->daysHired;
    }

    /**
     * @param mixed $daysHired
     * @return Hire
     */
    public function setDaysHired($daysHired)
    {
        $this->daysHired = $daysHired;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @param mixed $customer
     * @return Hire
     */
    public function setCustomer($customer)
    {
        $this->customer = $customer;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSalesperson()
    {
        return $this->salesperson;
    }

    /**
     * @param mixed $salesperson
     * @return Hire
     */
    public function setSalesperson($salesperson)
    {
        $this->salesperson = $salesperson;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCarReg()
    {
        return $this->carReg;
    }

    /**
     * @param mixed $carReg
     * @return Hire
     */
    public function setCarReg($carReg)
    {
        $this->carReg = $carReg;
        return $this;
    }
}
