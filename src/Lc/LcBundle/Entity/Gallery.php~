<?php

namespace Lc\LcBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Gallery
 */
class Gallery
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $shared;

    /**
     * @var integer
     */
    private $liked;

    /**
     * @var integer
     */
    private $commented;

    /**
     * @var string
     */
    private $token;

    /**
     * @var string
     */
    private $path;

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
     * Set shared
     *
     * @param integer $shared
     * @return Gallery
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
     * Set liked
     *
     * @param integer $liked
     * @return Gallery
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
     * Set commented
     *
     * @param integer $commented
     * @return Gallery
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
     * Set token
     *
     * @param string $token
     * @return Gallery
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
     * Set path
     *
     * @param string $path
     * @return Gallery
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return Gallery
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
     * @return Gallery
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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $gcomment;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $glike;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $gshare;

    /**
     * @var \Lc\LcBundle\Entity\User
     */
    private $user;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->gcomment = new \Doctrine\Common\Collections\ArrayCollection();
        $this->glike = new \Doctrine\Common\Collections\ArrayCollection();
        $this->gshare = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add gcomment
     *
     * @param \Lc\LcBundle\Entity\Gcomment $gcomment
     * @return Gallery
     */
    public function addGcomment(\Lc\LcBundle\Entity\Gcomment $gcomment)
    {
        $this->gcomment[] = $gcomment;

        return $this;
    }

    /**
     * Remove gcomment
     *
     * @param \Lc\LcBundle\Entity\Gcomment $gcomment
     */
    public function removeGcomment(\Lc\LcBundle\Entity\Gcomment $gcomment)
    {
        $this->gcomment->removeElement($gcomment);
    }

    /**
     * Get gcomment
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGcomment()
    {
        return $this->gcomment;
    }

    /**
     * Add glike
     *
     * @param \Lc\LcBundle\Entity\Glike $glike
     * @return Gallery
     */
    public function addGlike(\Lc\LcBundle\Entity\Glike $glike)
    {
        $this->glike[] = $glike;

        return $this;
    }

    /**
     * Remove glike
     *
     * @param \Lc\LcBundle\Entity\Glike $glike
     */
    public function removeGlike(\Lc\LcBundle\Entity\Glike $glike)
    {
        $this->glike->removeElement($glike);
    }

    /**
     * Get glike
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGlike()
    {
        return $this->glike;
    }

    /**
     * Add gshare
     *
     * @param \Lc\LcBundle\Entity\Gshare $gshare
     * @return Gallery
     */
    public function addGshare(\Lc\LcBundle\Entity\Gshare $gshare)
    {
        $this->gshare[] = $gshare;

        return $this;
    }

    /**
     * Remove gshare
     *
     * @param \Lc\LcBundle\Entity\Gshare $gshare
     */
    public function removeGshare(\Lc\LcBundle\Entity\Gshare $gshare)
    {
        $this->gshare->removeElement($gshare);
    }

    /**
     * Get gshare
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGshare()
    {
        return $this->gshare;
    }

    /**
     * Set user
     *
     * @param \Lc\LcBundle\Entity\User $user
     * @return Gallery
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
