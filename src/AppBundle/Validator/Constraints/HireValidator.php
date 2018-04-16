<?php
/**
 * Created by PhpStorm.
 * User: haa
 * Date: 16/04/18
 * Time: 16:26
 */

namespace AppBundle\Validator\Constraints;


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

    public function validate($value, Constraint $constraint)
    {
        $em = $this->getEntityManager();
        $em->getConnection()->executeQuery($sql, [
            ]
        );

        $this->context->buildViolation($constraint->message)
                ->addViolation();
    }
}