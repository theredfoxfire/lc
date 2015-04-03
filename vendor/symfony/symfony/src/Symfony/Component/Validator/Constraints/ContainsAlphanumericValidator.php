<?php
namespace Symfony\Component\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class ContainsAlphanumericValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint)
    {
		$current_date = new \DateTime();
		$dif = $value->diff($current_date)->y;
		
        if($dif < 17) { 
            $this->context->addViolation(
                $constraint->message
            );
        }
    }
}
