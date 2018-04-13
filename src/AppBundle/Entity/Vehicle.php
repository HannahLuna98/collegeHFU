<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Customer Details
 *
 * @package Database
 * @ORM\Entity(repositoryClass="AppBundle\Entity\Model\VehicleRepository")
 * @ORM\Table(name="car")
 */
class Vehicle
{
    /**
     * The Car reg
     * @ORM\Id
     * @ORM\Column(type="char", length=8, name="car_registration")
     */
    protected $carReg;

    /**
     * @ORM\Column(type="string", length=50, name="make")
     * @Assert\Length(
     *     max = 50,
     *     min = 2,
     * )
     */
    protected $make;

    /**
     * @ORM\Column(type="string", length=50, name="model")
     * @Assert\Length(
     *     max = 50,
     *     min = 2,
     * )
     */
    protected $model;

    /**
     * @ORM\Column(type="integer", name="capacity")
     * @Assert\Type(
     *     type="digit"
     * )
     */
    protected $capacity;

    /**
     * @ORM\Column(type="decimal", name="price")
     */
    protected $price;

    /**
     * @ORM\Column(type="boolean", name="car_available")
     */
    protected $available;

    /**
     * @return mixed
     */
    public function getCarReg()
    {
        return $this->carReg;
    }

    /**
     * @param mixed $carReg
     * @return Vehicle
     */
    public function setCarReg($carReg)
    {
        $this->carReg = $carReg;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMake()
    {
        return $this->make;
    }

    /**
     * @param mixed $make
     * @return Vehicle
     */
    public function setMake($make)
    {
        $this->make = $make;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param mixed $model
     * @return Vehicle
     */
    public function setModel($model)
    {
        $this->model = $model;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCapacity()
    {
        return $this->capacity;
    }

    /**
     * @param mixed $capacity
     * @return Vehicle
     */
    public function setCapacity($capacity)
    {
        $this->capacity = $capacity;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     * @return Vehicle
     */
    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAvailable()
    {
        return $this->available;
    }

    /**
     * @param mixed $available
     * @return Vehicle
     */
    public function setAvailable($available)
    {
        $this->available = $available;
        return $this;
    }
}

