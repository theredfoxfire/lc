<?php
namespace Lc\LcBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Forgot
{
    /**
     * @Assert\Email(
     *     message = "Email yang anda masukan tidak valid"
     * )
     */
    protected $email;
    
    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }
    
}
