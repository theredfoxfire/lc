<?php
namespace Lc\LcBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Repair
{
    /**
     * @Assert\Length(
     *     min = 6,
     *     minMessage = "Password setidaknya terdiri dari 6 karakter"
     * )
     */
    protected $password;
    
    public function getPassword()
    {
        return $this->password;
    }
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }
    
    public function getSalt()
    {
        return null;
    }
    
}
