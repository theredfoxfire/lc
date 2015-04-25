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
     * @var integer
     */
    private $id_1;

    /**
     * @var integer
     */
    private $id_2;

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
     * Set id_1
     *
     * @param integer $id1
     * @return Friend
     */
    public function setId1($id1)
    {
        $this->id_1 = $id1;

        return $this;
    }

    /**
     * Get id_1
     *
     * @return integer 
     */
    public function getId1()
    {
        return $this->id_1;
    }

    /**
     * Set id_2
     *
     * @param integer $id2
     * @return Friend
     */
    public function setId2($id2)
    {
        $this->id_2 = $id2;

        return $this;
    }

    /**
     * Get id_2
     *
     * @return integer 
     */
    public function getId2()
    {
        return $this->id_2;
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
}
