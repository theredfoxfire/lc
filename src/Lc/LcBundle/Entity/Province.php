<?php

namespace Lc\LcBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Province
 */
class Province
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
     * @return Province
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
     * @return Province
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
     * @return Province
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
     * @return Province
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
     * @return Province
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
     * @return Province
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
     * @return Province
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
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $city;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->city = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add city
     *
     * @param \Lc\LcBundle\Entity\City $city
     * @return Province
     */
    public function addCity(\Lc\LcBundle\Entity\City $city)
    {
        $this->city[] = $city;

        return $this;
    }

    /**
     * Remove city
     *
     * @param \Lc\LcBundle\Entity\City $city
     */
    public function removeCity(\Lc\LcBundle\Entity\City $city)
    {
        $this->city->removeElement($city);
    }

    /**
     * Get city
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCity()
    {
        return $this->city;
    }
}
