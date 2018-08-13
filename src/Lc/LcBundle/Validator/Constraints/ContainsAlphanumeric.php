<?php
namespace Symfony\Component\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class ContainsAlphanumeric extends Constraint
{
    //public $message = 'The string "%string%" contains an illegal character: it can only contain letters or numbers.';
    public $message = 'Usia anda tidak mencukupi batas minimal penggunaan aplikasi. (minimal 17 tahun)';
}
