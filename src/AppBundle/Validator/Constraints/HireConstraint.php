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
    /**
     * Displays an error message if a user tries to double book
     */
    public function validatedBy()
    {
        return HireValidator::class;
    }
    public $message = 'The requested vehicle is not
    available between the date range chosen. 
    Please pick another date, or vehicle to hire out.';
}