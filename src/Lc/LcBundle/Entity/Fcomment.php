<?php

namespace Lc\LcBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fcomment
 */
class Fcomment
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $comment;

    /**
     * @var boolean
     */
    private $is_publish;

    /**
     * @var string
     */
    private $token;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \DateTime
     */
    private $updated_at;


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
     * Set comment
     *
     * @param string $comment
     * @return Fcomment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string 
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set is_publish
     *
     * @param boolean $isPublish
     * @return Fcomment
     */
    public function setIsPublish($isPublish)
    {
        $this->is_publish = $isPublish;

        return $this;
    }

    /**
     * Get is_publish
     *
     * @return boolean 
     */
    public function getIsPublish()
    {
        return $this->is_publish;
    }

    /**
     * Set token
     *
     * @param string $token
     * @return Fcomment
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
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return Fcomment
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
     * @return Fcomment
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
     * @var \Lc\LcBundle\Entity\Feeling
     */
    private $feeling;

    /**
     * @var \Lc\LcBundle\Entity\User
     */
    private $user;


    /**
     * Set feeling
     *
     * @param \Lc\LcBundle\Entity\Feeling $feeling
     * @return Fcomment
     */
    public function setFeeling(\Lc\LcBundle\Entity\Feeling $feeling = null)
    {
        $this->feeling = $feeling;

        return $this;
    }

    /**
     * Get feeling
     *
     * @return \Lc\LcBundle\Entity\Feeling 
     */
    public function getFeeling()
    {
        return $this->feeling;
    }

    /**
     * Set user
     *
     * @param \Lc\LcBundle\Entity\User $user
     * @return Fcomment
     */
    public function setUser(\Lc\LcBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Lc\LcBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}
