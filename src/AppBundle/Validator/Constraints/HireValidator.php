<?php
/**
 * Created by PhpStorm.
 * User: haa
 * Date: 16/04/18
 * Time: 16:26
 */

namespace AppBundle\Validator\Constraints;


use AppBundle\Entity\Vehicle;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class HireValidator extends ConstraintValidator
{
    /**
     * @var EntityManager
     */
    private $em;

    /**
     * HireValidator constructor.
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * Checks if the date range chosen is free to be booked,
     * or else it returns an error
     */
    public function validate($value, Constraint $constraint)
    {
        $repo = $this->em->getRepository(Vehicle::class);
        $available = $repo
            ->isVehicleAvailableBetween($value['car_registration'], $value['rent_date'], $value['return_date']
            );

        if (!$available) {
            $this->context->buildViolation($constraint->message)->addViolation();
        }
    }
}