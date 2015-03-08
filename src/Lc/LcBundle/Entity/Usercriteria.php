<?php

namespace Lc\LcBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Usercriteria
 */
class Usercriteria
{
    /**
     * @var integer
     */
    private $id;

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
     * Set hobby
     *
     * @param integer $hobby
     * @return Usercriteria
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
     * @return Usercriteria
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
     * @return Usercriteria
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
     * Set sallary
     *
     * @param integer $sallary
     * @return Usercriteria
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
     * @return Usercriteria
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
     * @return Usercriteria
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
     * @return Usercriteria
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
     * @return Usercriteria
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
     * @return Usercriteria
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
     * @return Usercriteria
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
     * @return Usercriteria
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
     * @return Usercriteria
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
     * @return Usercriteria
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
     * @return Usercriteria
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
     * @return Usercriteria
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
     * @return Usercriteria
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
