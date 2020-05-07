<?php

namespace Lc\LcBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gregwar\Image\Image;

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

    public $file;


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
    /**
     * @var \Lc\LcBundle\Entity\User
     */
    private $user;


    /**
     * Set user
     *
     * @param \Lc\LcBundle\Entity\User $user
     * @return Feeling
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
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $fcomment;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $flike;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $fshare;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->fcomment = new \Doctrine\Common\Collections\ArrayCollection();
        $this->flike = new \Doctrine\Common\Collections\ArrayCollection();
        $this->fshare = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add fcomment
     *
     * @param \Lc\LcBundle\Entity\Fcomment $fcomment
     * @return Feeling
     */
    public function addFcomment(\Lc\LcBundle\Entity\Fcomment $fcomment)
    {
        $this->fcomment[] = $fcomment;

        return $this;
    }

    /**
     * Remove fcomment
     *
     * @param \Lc\LcBundle\Entity\Fcomment $fcomment
     */
    public function removeFcomment(\Lc\LcBundle\Entity\Fcomment $fcomment)
    {
        $this->fcomment->removeElement($fcomment);
    }

    /**
     * Get fcomment
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFcomment()
    {
        return $this->fcomment;
    }

    /**
     * Add flike
     *
     * @param \Lc\LcBundle\Entity\Flike $flike
     * @return Feeling
     */
    public function addFlike(\Lc\LcBundle\Entity\Flike $flike)
    {
        $this->flike[] = $flike;

        return $this;
    }

    /**
     * Remove flike
     *
     * @param \Lc\LcBundle\Entity\Flike $flike
     */
    public function removeFlike(\Lc\LcBundle\Entity\Flike $flike)
    {
        $this->flike->removeElement($flike);
    }

    /**
     * Get flike
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFlike()
    {
        return $this->flike;
    }

    /**
     * Add fshare
     *
     * @param \Lc\LcBundle\Entity\Fshare $fshare
     * @return Feeling
     */
    public function addFshare(\Lc\LcBundle\Entity\Fshare $fshare)
    {
        $this->fshare[] = $fshare;

        return $this;
    }

    /**
     * Remove fshare
     *
     * @param \Lc\LcBundle\Entity\Fshare $fshare
     */
    public function removeFshare(\Lc\LcBundle\Entity\Fshare $fshare)
    {
        $this->fshare->removeElement($fshare);
    }

    /**
     * Get fshare
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFshare()
    {
        return $this->fshare;
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
     * @var string
     */
    private $foto;


    /**
     * Set foto
     *
     * @param string $foto
     * @return Feeling
     */
    public function setFoto($foto)
    {
        $this->foto = $foto;

        return $this;
    }

    /**
     * Get foto
     *
     * @return string
     */
    public function getFoto()
    {
        return $this->foto;
    }

    public function setFile($file)
        {
            $this->file = $file;

            return $this;
        }

    /**
     * Get foto
     *
     * @return string
     */
    public function getFile()
    {
        return $this->file;
    }



    /**
     * @ORM\PrePersist
     */
    protected function getUploadDir()
	{
		return 'uploads/feels';
	}

	protected function getUploadRootDir()
	{
		return __DIR__.'/../../../../web/'.$this->getUploadDir();
	}

	public function getWebPath()
	{
		return null === $this->foto ? null : $this->getUploadDir().'/'.$this->foto;
	}

	public function getAbsolutePath()
	{
		return null === $this->foto ? null : $this->getUploadRootDir().'/'.$this->foto;
	}


    /**
     * @ORM\PrePersist
     */
    public function preUpload()
    {
        if (null !== $this->file){
				$this->foto = uniqid().'.'.$this->file->guessExtension();
			}
    }

    /**
     * @ORM\PostPersist
     */
    public function upload()
    {
        if (null === $this->file){
    			return;
    		}

    		$this->file->move($this->getUploadRootDir(), $this->foto);

    		Image::open($this->getUploadRootDir().'/'.$this->foto)
    		->cropResize(1270, 750, $background = 0xffffff)
    		->save($this->getUploadRootDir().'/feel_'.$this->foto);

    		$rmfile = $this->getAbsolutePath();

        if(file_exists($rmfile)) {
    			unlink($rmfile);
    		}

    		unset($this->file);
    }

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $children;

    /**
     * @var \Lc\LcBundle\Entity\Feeling
     */
    private $parent;


    /**
     * Add children
     *
     * @param \Lc\LcBundle\Entity\Feeling $children
     * @return Feeling
     */
    public function addChild(\Lc\LcBundle\Entity\Feeling $children)
    {
        $this->children[] = $children;

        return $this;
    }

    /**
     * Remove children
     *
     * @param \Lc\LcBundle\Entity\Feeling $children
     */
    public function removeChild(\Lc\LcBundle\Entity\Feeling $children)
    {
        $this->children->removeElement($children);
    }

    /**
     * Get children
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * Set parent
     *
     * @param \Lc\LcBundle\Entity\Feeling $parent
     * @return Feeling
     */
    public function setParent(\Lc\LcBundle\Entity\Feeling $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return \Lc\LcBundle\Entity\Feeling
     */
    public function getParent()
    {
        return $this->parent;
    }
    /**
     * @var string
     */
    private $channel;


    /**
     * Set channel
     *
     * @param string $channel
     * @return Feeling
     */
    public function setChannel($channel)
    {
        $this->channel = $channel;

        return $this;
    }

    /**
     * Get channel
     *
     * @return string 
     */
    public function getChannel()
    {
        return $this->channel;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $orderan;


    /**
     * Add orderan
     *
     * @param \Lc\LcBundle\Entity\Orderan $orderan
     * @return Feeling
     */
    public function addOrderan(\Lc\LcBundle\Entity\Orderan $orderan)
    {
        $this->orderan[] = $orderan;

        return $this;
    }

    /**
     * Remove orderan
     *
     * @param \Lc\LcBundle\Entity\Orderan $orderan
     */
    public function removeOrderan(\Lc\LcBundle\Entity\Orderan $orderan)
    {
        $this->orderan->removeElement($orderan);
    }

    /**
     * Get orderan
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOrderan()
    {
        return $this->orderan;
    }
}
