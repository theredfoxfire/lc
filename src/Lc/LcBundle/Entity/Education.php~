<?php

namespace Lc\LcBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Education
 */
class Education
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
     * @return Education
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
     * @return Education
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
     * Set token
     *
     * @param string $token
     * @return Education
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
     * @var \Lc\LcBundle\Entity\Profile
     */
    private $profile;


    /**
     * Set usercriteria
     *
     * @param \Lc\LcBundle\Entity\Usercriteria $usercriteria
     * @return Education
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
     * Set profile
     *
     * @param \Lc\LcBundle\Entity\Profile $profile
     * @return Education
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
    
    public function __construct(){
		$this->profile = new \Doctrine\Common\Collections\ArrayCollection();
		$this->usercriteria = new \Doctrine\Common\Collections\ArrayCollection();
		
	}
	
	public function __toString()
	{
		return $this->getName() ? $this->getName() : "";
	}

    /**
     * Add usercriteria
     *
     * @param \Lc\LcBundle\Entity\Usercriteria $usercriteria
     * @return Education
     */
    public function addUsercriterium(\Lc\LcBundle\Entity\Usercriteria $usercriteria)
    {
        $this->usercriteria[] = $usercriteria;

        return $this;
    }

    /**
     * Remove usercriteria
     *
     * @param \Lc\LcBundle\Entity\Usercriteria $usercriteria
     */
    public function removeUsercriterium(\Lc\LcBundle\Entity\Usercriteria $usercriteria)
    {
        $this->usercriteria->removeElement($usercriteria);
    }

    /**
     * Add profile
     *
     * @param \Lc\LcBundle\Entity\Profile $profile
     * @return Education
     */
    public function addProfile(\Lc\LcBundle\Entity\Profile $profile)
    {
        $this->profile[] = $profile;

        return $this;
    }

    /**
     * Remove profile
     *
     * @param \Lc\LcBundle\Entity\Profile $profile
     */
    public function removeProfile(\Lc\LcBundle\Entity\Profile $profile)
    {
        $this->profile->removeElement($profile);
    }
}
