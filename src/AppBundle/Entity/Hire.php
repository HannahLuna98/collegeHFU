<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Customer Details
 *
 * @package Database
 * @ORM\Entity
 * @ORM\Table(name="hire")
 */
class Hire
{
    /**
     * The primary identifier
     *
     * @ORM\ID
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="boolean", name=""insurance_cover")
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
}
