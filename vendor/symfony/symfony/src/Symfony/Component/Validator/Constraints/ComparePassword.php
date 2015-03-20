<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 * @Target({"PROPERTY", "METHOD", "ANNOTATION"})
 *
 * @author Bernhard Schussek <bschussek@gmail.com>
 *
 * @api
 */
class ComparePassword extends Constraint
{
    public $message = 'Password yang diulangi tidak cocok dengan sebelumnya.';
 
    public $field;

	public function getTargets()
	{
		return array(self::CLASS_CONSTRAINT, self::PROPERTY_CONSTRAINT);
	} 
}
