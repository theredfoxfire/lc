<?php

namespace Lc\LcBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Profile
 */
class Profile
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
     * @var integer
     */
    private $hobby;

    /**
     * @var integer
     */
    private $work;

    /**
     * @var integer
     */
    private $education;

    /**
     * @var string
     */
    private $address;

    /**
     * @var integer
     */
    private $sallary;

    /**
     * @var integer
     */
    private $province;

    /**
     * @var integer
     */
    private $city;

    /**
     * @var integer
     */
    private $lived;

    /**
     * @var integer
     */
    private $smoking;

    /**
     * @var integer
     */
    private $status;

    /**
     * @var integer
     */
    private $sex;

    /**
     * @var integer
     */
    private $religy;

    /**
     * @var integer
     */
    private $alcoholic;

    /**
     * @var integer
     */
    private $plan;

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
     * @return Profile
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
     * Set hobby
     *
     * @param integer $hobby
     * @return Profile
     */
    public function setHobby($hobby)
    {
        $this->hobby = $hobby;

        return $this;
    }

    /**
     * Get hobby
     *
     * @return integer 
     */
    public function getHobby()
    {
        return $this->hobby;
    }

    /**
     * Set work
     *
     * @param integer $work
     * @return Profile
     */
    public function setWork($work)
    {
        $this->work = $work;

        return $this;
    }

    /**
     * Get work
     *
     * @return integer 
     */
    public function getWork()
    {
        return $this->work;
    }

    /**
     * Set education
     *
     * @param integer $education
     * @return Profile
     */
    public function setEducation($education)
    {
        $this->education = $education;

        return $this;
    }

    /**
     * Get education
     *
     * @return integer 
     */
    public function getEducation()
    {
        return $this->education;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return Profile
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set sallary
     *
     * @param integer $sallary
     * @return Profile
     */
    public function setSallary($sallary)
    {
        $this->sallary = $sallary;

        return $this;
    }

    /**
     * Get sallary
     *
     * @return integer 
     */
    public function getSallary()
    {
        return $this->sallary;
    }

    /**
     * Set province
     *
     * @param integer $province
     * @return Profile
     */
    public function setProvince($province)
    {
        $this->province = $province;

        return $this;
    }

    /**
     * Get province
     *
     * @return integer 
     */
    public function getProvince()
    {
        return $this->province;
    }

    /**
     * Set city
     *
     * @param integer $city
     * @return Profile
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return integer 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set lived
     *
     * @param integer $lived
     * @return Profile
     */
    public function setLived($lived)
    {
        $this->lived = $lived;

        return $this;
    }

    /**
     * Get lived
     *
     * @return integer 
     */
    public function getLived()
    {
        return $this->lived;
    }

    /**
     * Set smoking
     *
     * @param integer $smoking
     * @return Profile
     */
    public function setSmoking($smoking)
    {
        $this->smoking = $smoking;

        return $this;
    }

    /**
     * Get smoking
     *
     * @return integer 
     */
    public function getSmoking()
    {
        return $this->smoking;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return Profile
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set sex
     *
     * @param integer $sex
     * @return Profile
     */
    public function setSex($sex)
    {
        $this->sex = $sex;

        return $this;
    }

    /**
     * Get sex
     *
     * @return integer 
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * Set religy
     *
     * @param integer $religy
     * @return Profile
     */
    public function setReligy($religy)
    {
        $this->religy = $religy;

        return $this;
    }

    /**
     * Get religy
     *
     * @return integer 
     */
    public function getReligy()
    {
        return $this->religy;
    }

    /**
     * Set alcoholic
     *
     * @param integer $alcoholic
     * @return Profile
     */
    public function setAlcoholic($alcoholic)
    {
        $this->alcoholic = $alcoholic;

        return $this;
    }

    /**
     * Get alcoholic
     *
     * @return integer 
     */
    public function getAlcoholic()
    {
        return $this->alcoholic;
    }

    /**
     * Set plan
     *
     * @param integer $plan
     * @return Profile
     */
    public function setPlan($plan)
    {
        $this->plan = $plan;

        return $this;
    }

    /**
     * Get plan
     *
     * @return integer 
     */
    public function getPlan()
    {
        return $this->plan;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return Profile
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
     * @return Profile
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
     * @return Profile
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
}
