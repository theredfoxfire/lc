<?php

namespace Lc\LcBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Friend
 */
class Friend
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var boolean
     */
    private $status;

    /**
     * @var boolean
     */
    private $is_confirmed;

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
     * Set status
     *
     * @param boolean $status
     * @return Friend
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return boolean 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set is_confirmed
     *
     * @param boolean $isConfirmed
     * @return Friend
     */
    public function setIsConfirmed($isConfirmed)
    {
        $this->is_confirmed = $isConfirmed;

        return $this;
    }

    /**
     * Get is_confirmed
     *
     * @return boolean 
     */
    public function getIsConfirmed()
    {
        return $this->is_confirmed;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return Friend
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
     * @return Friend
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
     * @return Friend
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
     * @ORM\PrePersist
     */
    public function setCreatedAtValue()
    {
        $this->created_at = new \DateTime();
    }

    /**
     * @ORM\PrePersist
     */
    public function setTokenValue()
    {
        if(!$this->getToken()) {
            $st = date('Y-m-d H:i:s');
			$this->token = sha1($st.rand(11111, 99999));
        }
    }

    /**
     * @ORM\PreUpdate
     */
    public function setUpdatedAtValue()
    {
        $this->updated_at = new \DateTime();
    }

    /**
     * @var \Lc\LcBundle\Entity\User
     */
    private $user1;

    /**
     * @var \Lc\LcBundle\Entity\User
     */
    private $user2;


    /**
     * Set user1
     *
     * @param \Lc\LcBundle\Entity\User $user1
     * @return Friend
     */
    public function setUser1(\Lc\LcBundle\Entity\User $user1 = null)
    {
        $this->user1 = $user1;

        return $this;
    }

    /**
     * Get user1
     *
     * @return \Lc\LcBundle\Entity\User 
     */
    public function getUser1()
    {
        return $this->user1;
    }

    /**
     * Set user2
     *
     * @param \Lc\LcBundle\Entity\User $user2
     * @return Friend
     */
    public function setUser2(\Lc\LcBundle\Entity\User $user2 = null)
    {
        $this->user2 = $user2;

        return $this;
    }

    /**
     * Get user2
     *
     * @return \Lc\LcBundle\Entity\User 
     */
    public function getUser2()
    {
        return $this->user2;
    }
    /**
     * @var boolean
     */
    private $cast;


    /**
     * Set cast
     *
     * @param boolean $cast
     * @return Friend
     */
    public function setCast($cast)
    {
        $this->cast = $cast;

        return $this;
    }

    /**
     * Get cast
     *
     * @return boolean 
     */
    public function getCast()
    {
        return $this->cast;
    }
}
