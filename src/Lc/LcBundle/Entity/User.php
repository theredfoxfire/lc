<?php

namespace Lc\LcBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 */
class User
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $phone;

    /**
     * @var string
     */
    private $password;
    
    private $password2;
    
    private $birthday;

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
     * Set username
     *
     * @param string $username
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return User
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }
    
    public function setPassword2($password2)
    {
        $this->password2 = $password2;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword2()
    {
        return $this->password2;
    }
    
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * Set is_active
     *
     * @param boolean $isActive
     * @return User
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
     * @return User
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
     * @return User
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
     * @return User
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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $feeling;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->feeling = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add feeling
     *
     * @param \Lc\LcBundle\Entity\Feeling $feeling
     * @return User
     */
    public function addFeeling(\Lc\LcBundle\Entity\Feeling $feeling)
    {
        $this->feeling[] = $feeling;

        return $this;
    }

    /**
     * Remove feeling
     *
     * @param \Lc\LcBundle\Entity\Feeling $feeling
     */
    public function removeFeeling(\Lc\LcBundle\Entity\Feeling $feeling)
    {
        $this->feeling->removeElement($feeling);
    }

    /**
     * Get feeling
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFeeling()
    {
        return $this->feeling;
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
     * @return User
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
     * @return User
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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $gshare;

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
    private $gallery;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $userdoing;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $userlog;


    /**
     * Add fcomment
     *
     * @param \Lc\LcBundle\Entity\Fcomment $fcomment
     * @return User
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
     * @return User
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
     * @return User
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
     * Add gshare
     *
     * @param \Lc\LcBundle\Entity\Gshare $gshare
     * @return User
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
     * Add gcomment
     *
     * @param \Lc\LcBundle\Entity\Gcomment $gcomment
     * @return User
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
     * @return User
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
     * Add gallery
     *
     * @param \Lc\LcBundle\Entity\Gallery $gallery
     * @return User
     */
    public function addGallery(\Lc\LcBundle\Entity\Gallery $gallery)
    {
        $this->gallery[] = $gallery;

        return $this;
    }

    /**
     * Remove gallery
     *
     * @param \Lc\LcBundle\Entity\Gallery $gallery
     */
    public function removeGallery(\Lc\LcBundle\Entity\Gallery $gallery)
    {
        $this->gallery->removeElement($gallery);
    }

    /**
     * Get gallery
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGallery()
    {
        return $this->gallery;
    }

    /**
     * Add userdoing
     *
     * @param \Lc\LcBundle\Entity\Userdoing $userdoing
     * @return User
     */
    public function addUserdoing(\Lc\LcBundle\Entity\Userdoing $userdoing)
    {
        $this->userdoing[] = $userdoing;

        return $this;
    }

    /**
     * Remove userdoing
     *
     * @param \Lc\LcBundle\Entity\Userdoing $userdoing
     */
    public function removeUserdoing(\Lc\LcBundle\Entity\Userdoing $userdoing)
    {
        $this->userdoing->removeElement($userdoing);
    }

    /**
     * Get userdoing
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUserdoing()
    {
        return $this->userdoing;
    }

    /**
     * Add userlog
     *
     * @param \Lc\LcBundle\Entity\Userlog $userlog
     * @return User
     */
    public function addUserlog(\Lc\LcBundle\Entity\Userlog $userlog)
    {
        $this->userlog[] = $userlog;

        return $this;
    }

    /**
     * Remove userlog
     *
     * @param \Lc\LcBundle\Entity\Userlog $userlog
     */
    public function removeUserlog(\Lc\LcBundle\Entity\Userlog $userlog)
    {
        $this->userlog->removeElement($userlog);
    }

    /**
     * Get userlog
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUserlog()
    {
        return $this->userlog;
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
			$st = $st.$this->getEmail();
			$this->token = sha1($st.rand(11111, 99999));
        }
    }
    
	public function getSalt()
    {
        return null;
    }

    /**
     * @ORM\PreUpdate
     */
    public function setUpdatedAtValue()
    {
        $this->updated_at = new \DateTime();
    }
}
