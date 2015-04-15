<?php
namespace Lc\LcBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

class Foto
{
     protected $file;

     
    public function getFile()
    {
        return $this->file;
    }
    public function setFile($file)
    {
        $this->file = $file;

        return $this;
    }
    
}
