<?php

namespace Lc\LcBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Hobby
 */
class Hobby
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var boolean
     */
    private $is_active;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \DateTime
     */
    private $updated_at;

    /**
     * @var string
     */
    private $token;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Hobby
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set is_active
     *
     * @param boolean $isActive
     * @return Hobby
     */
    public function setIsActive($isActive)
    {
        $this->is_active = $isActive;

        return $this;
    }

    /**
     * Get is_active
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->is_active;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return Hobby
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;

        return $this;
    }

    /**
     * Get created_at
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set updated_at
     *
     * @param \DateTime $updatedAt
     * @return Hobby
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;

        return $this;
    }

    /**
     * Get updated_at
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * Set token
     *
     * @param string $token
     * @return Hobby
     */
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Get token
     *
     * @return string 
     */
    public function getToken()
    {
        return $this->token;
    }
    /**
     * @var \Lc\LcBundle\Entity\Usercriteria
     */
    private $usercriteria;


    /**
     * Set usercriteria
     *
     * @param \Lc\LcBundle\Entity\Usercriteria $usercriteria
     * @return Hobby
     */
    public function setUsercriteria(\Lc\LcBundle\Entity\Usercriteria $usercriteria = null)
    {
        $this->usercriteria = $usercriteria;

        return $this;
    }

    /**
     * Get usercriteria
     *
     * @return \Lc\LcBundle\Entity\Usercriteria 
     */
    public function getUsercriteria()
    {
        return $this->usercriteria;
    }
    /**
     * @var \Lc\LcBundle\Entity\Profile
     */
    private $profile;


    /**
     * Set profile
     *
     * @param \Lc\LcBundle\Entity\Profile $profile
     * @return Hobby
     */
    public function setProfile(\Lc\LcBundle\Entity\Profile $profile = null)
    {
        $this->profile = $profile;

        return $this;
    }

    /**
     * Get profile
     *
     * @return \Lc\LcBundle\Entity\Profile 
     */
    public function getProfile()
    {
        return $this->profile;
    }
    
    public function __toString()
	{
		return $this->getName() ? $this->getName() : "";
	}
    
    public function __construct(){
		$this->profile = new \Doctrine\Common\Collections\ArrayCollection();
		$this->usercriteria = new \Doctrine\Common\Collections\ArrayCollection();
		
	}
}
