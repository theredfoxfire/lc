<?php

namespace Lc\LcBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Feeling
 */
class Feeling
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $feel;

    /**
     * @var integer
     */
    private $liked;

    /**
     * @var integer
     */
    private $shared;

    /**
     * @var integer
     */
    private $commented;

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
     * Set feel
     *
     * @param string $feel
     * @return Feeling
     */
    public function setFeel($feel)
    {
        $this->feel = $feel;

        return $this;
    }

    /**
     * Get feel
     *
     * @return string 
     */
    public function getFeel()
    {
        return $this->feel;
    }

    /**
     * Set liked
     *
     * @param integer $liked
     * @return Feeling
     */
    public function setLiked($liked)
    {
        $this->liked = $liked;

        return $this;
    }

    /**
     * Get liked
     *
     * @return integer 
     */
    public function getLiked()
    {
        return $this->liked;
    }

    /**
     * Set shared
     *
     * @param integer $shared
     * @return Feeling
     */
    public function setShared($shared)
    {
        $this->shared = $shared;

        return $this;
    }

    /**
     * Get shared
     *
     * @return integer 
     */
    public function getShared()
    {
        return $this->shared;
    }

    /**
     * Set commented
     *
     * @param integer $commented
     * @return Feeling
     */
    public function setCommented($commented)
    {
        $this->commented = $commented;

        return $this;
    }

    /**
     * Get commented
     *
     * @return integer 
     */
    public function getCommented()
    {
        return $this->commented;
    }

    /**
     * Set is_active
     *
     * @param boolean $isActive
     * @return Feeling
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
     * @return Feeling
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
     * @return Feeling
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
     * @return Feeling
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
