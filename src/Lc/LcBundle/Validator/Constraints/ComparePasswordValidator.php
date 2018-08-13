<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Lc\LcBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * @author Hasan Setiawan <vizzlearn@gmail.com>
 *
 * @api
 */
class ComparePasswordValidator extends ConstraintValidator
{
    /**
     * {@inheritdoc}
     */
    public function validate($value, Constraint $constraint)
    {
        $p1    = $this->context->getRoot()->get($constraint->field)->getData();
        if ($value !== $p1) {
            $this->context->addViolation($constraint->message, array(
                '{{ value }}' => $this->formatValue($value),
            ));

            return false;
        }

        return true;
    }
}
