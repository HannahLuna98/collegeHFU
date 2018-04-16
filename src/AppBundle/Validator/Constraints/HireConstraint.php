<?php
/**
 * Created by PhpStorm.
 * User: haa
 * Date: 16/04/18
 * Time: 16:33
 */

namespace AppBundle\Validator\Constraints;


use Symfony\Component\Validator\Constraint;

class HireConstraint extends Constraint
{
    public function validatedBy()
    {
        return HireValidator::class;
    }
    public $message = 'The requested vehicle is not available';
}