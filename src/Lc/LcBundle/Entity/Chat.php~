<?php

namespace Lc\LcBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Chat
 */
class Chat
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
     * @var string
     */
    private $message;

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
     * @return Chat
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
     * @return Chat
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
     * Set message
     *
     * @param string $message
     * @return Chat
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string 
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return Chat
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
     * @return Chat
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
     * @return Chat
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
     * @return Chat
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
     * @return Chat
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
     * @var integer
     */
    private $sender_id;


    /**
     * Set sender_id
     *
     * @param integer $senderId
     * @return Chat
     */
    public function setSenderId($senderId)
    {
        $this->sender_id = $senderId;

        return $this;
    }

    /**
     * Get sender_id
     *
     * @return integer 
     */
    public function getSenderId()
    {
        return $this->sender_id;
    }
    /**
     * @var boolean
     */
    private $is_read;


    /**
     * Set is_read
     *
     * @param boolean $isRead
     * @return Chat
     */
    public function setIsRead($isRead)
    {
        $this->is_read = $isRead;

        return $this;
    }

    /**
     * Get is_read
     *
     * @return boolean 
     */
    public function getIsRead()
    {
        return $this->is_read;
    }
}
