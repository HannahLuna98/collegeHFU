<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Customer Details
 *
 * @package Database
 * @ORM\Entity
 * @ORM\Table(name="car")
 */
class Vehicle
{
    /**
     * The Car reg
     * @ORM\Column(type="char", length=8, name="car_registration")
     */
    protected $carReg;

    /**
     * @ORM\Column(type="varchar", length=50, name="make")
     * @Assert\Length(
     *     max = 50,
     *     min = 2,
     * )
     */
    protected $make;

    /**
     * @ORM\Column(type="varchar", length=50, name="model")
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
     * @ORM\Column(type="decimal" name="price")
     */
    protected $price;

    /**
     * @ORM\Column(type="boolean", name="car_available")
     */
    protected $available;
}

