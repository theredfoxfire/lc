<?php
namespace Lc\LcBundle\Entity;

use Symfony\Component\Security\Core\Validator\Constraints as SecurityAssert;
use Symfony\Component\Validator\Constraints as Assert;

class ChangePassword
{
    /**
     * @SecurityAssert\UserPassword(
     *     message = "Password yang anda masukan tidak benar"
     * )
     */
     protected $oldPassword;

    /**
     * @Assert\Length(
     *     min = 6,
     *     minMessage = "Password setidaknya terdiri dari 6 karakter"
     * )
     */
     protected $newPassword;
     
    public function getOldPassword()
    {
        return $this->oldPassword;
    }
    public function setOldPassword($oldPassword)
    {
        $this->oldPassword = $oldPassword;

        return $this;
    }
    
    public function getNewPassword()
    {
        return $this->newPassword;
    }
    public function setNewPassword($newPassword)
    {
        $this->newPassword = $newPassword;

        return $this;
    }
    
}
