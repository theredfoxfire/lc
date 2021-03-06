<?php

namespace Lc\LcBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;
use Gregwar\Image\Image;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * User
 */
class User implements UserInterface, \Serializable
{
    /**
     * @var integer
     */
    protected $id;
    /** @ORM\Column(name="facebook_id", type="string", length=255, nullable=true) */
    protected $facebook_id;
    /** @ORM\Column(name="facebook_access_token", type="string", length=255, nullable=true) */
    protected $facebook_access_token;
    /** @ORM\Column(name="google_id", type="string", length=255, nullable=true) */
    protected $google_id;
    /** @ORM\Column(name="google_access_token", type="string", length=255, nullable=true) */
    protected $google_access_token;
    /**
     * @var string
     */
    protected $phone;
    protected $username;
    protected $email;
    protected $email_canonical;
    protected $password2;
    protected $password;
    protected $birthday;
    protected $sex;

    public $fullname;
    public $file;

    /**
     * @var boolean
     */
    protected $is_active;

    /**
     * @var \DateTime
     */
    protected $created_at;

    /**
     * @var \DateTime
     */
    protected $updated_at;

    /**
     * @var string
     */
    protected $token;

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

    public function setFacebookId($facebook_id)
    {
        $this->username = $facebook_id;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getFacebookId()
    {
        return $this->facebook_id;
    }

    public function setGoogleId($google_id)
    {
        $this->username = $google_id;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getGoogleId()
    {
        return $this->google_id;
    }

    public function setGoogleAccessToken($google_access_token)
    {
        $this->username = $google_access_token;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getGoogleAccessToken()
    {
        return $this->google_access_token;
    }

    public function setFacebookAccessToken($facebook_access_token)
    {
        $this->username = $facebook_access_token;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getFacebookAccessToken()
    {
        return $this->facebook_access_token;
    }

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
     * Set email_canonical
     *
     * @param string email_canonical
     * @return User
     */
    public function setEmailCanonical($email_canonical)
    {
        $this->email_canonical = $email_canonical;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmailCanonical()
    {
        return $this->email_canonical;
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

    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt,
        ));
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list(
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt
        ) = unserialize($serialized);
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

    public function setSex($sex)
    {
        $this->sex = $sex;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getSex()
    {
        return $this->sex;
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
        $this->birthday = new \DateTime($birthday);

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
    protected $feeling;

    /**
     * Constructor
     */
    // public function __construct()
    // {
    //     $this->feeling = new \Doctrine\Common\Collections\ArrayCollection();
    //     parent::__construct();
    // }

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
    protected $usercriteria;

    /**
     * @var \Lc\LcBundle\Entity\Profile
     */
    protected $profile;


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
    protected $fcomment;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    protected $flike;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    protected $fshare;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    protected $gshare;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    protected $gcomment;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    protected $glike;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    protected $gallery;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    protected $userdoing;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    protected $userlog;


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
        if (!$this->getToken()) {
            $st = date('Y-m-d H:i:s');
            $st = $st.$this->getEmail();
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

    public function getRoles()
    {
        return array('ROLE_USER');
    }

    public function getSalt()
    {
        return null;
    }

    public function eraseCredentials()
    {
    }
    //~
    //~ public function equals(User $user)
    //~ {
    //~ return $user->getUsername() == $this->getUsername();
    //~ }
    //~
    //~ public function isEnabled(){
    //~ return $this->getIsActive();
    //~ }
    //~ public function isCredentialsNonExpired(){
    //~ return true;
    //~ }
    //~
    //~ public function isAccountNonExpired(){
    //~ return true;
    //~ }
    //~
    //~ public function isAccountNonLocked(){
    //~ return true;
    //~ }
    /**
     * @var string
     */
    protected $foto;


    /**
     * Set foto
     *
     * @param string $foto
     * @return User
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
        return 'uploads/users';
    }

    protected function getUploadRootDir()
    {
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    public function getWebPath()
    {
        return null === $this->foto ? null : $this->getUploadDir().'/'.$this->foto;
    }

    public function getWebPathMini()
    {
        return null === $this->foto ? null : $this->getUploadDir().'/mini_'.$this->foto;
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
        if (null !== $this->file) {
            $this->foto = uniqid().'.'.$this->file->guessExtension();
        }
    }

    /**
     * @ORM\PostPersist
     */
    public function upload()
    {
        if (null === $this->file) {
            return;
        }
        $this->file->move($this->getUploadRootDir(), $this->foto);

        Image::open($this->getUploadRootDir().'/'.$this->foto)
        ->cropResize(600, 600, $background = 0xffffff)
        ->save($this->getUploadRootDir().'/index_'.$this->foto);

        Image::open($this->getUploadRootDir().'/'.$this->foto)
        ->cropResize(328, 328, $background = 0xffffff)
        ->save($this->getUploadRootDir().'/grande_'.$this->foto);

        Image::open($this->getUploadRootDir().'/'.$this->foto)
        ->cropResize(128, 128, $background = 0xffffff)
        ->save($this->getUploadRootDir().'/mini_'.$this->foto);

        Image::open($this->getUploadRootDir().'/'.$this->foto)
        ->cropResize(96, 96, $background = 0xffffff)
        ->save($this->getUploadRootDir().'/thumb_'.$this->foto);

        $rmfile = $this->getAbsolutePath();
        if (file_exists($rmfile)) {
            unlink($rmfile);
        }

        unset($this->file);
    }


    /**
     * @ORM\PostPersist
     */
    public function updateLuceneIndex()
    {
        // Add your code here
    }

    /**
     * @ORM\PostRemove
     */
    public function removeUpload()
    {
        $file = $this->getAbsolutePath();
        if (file_exists($file)) {
            unlink($file);
        }
    }

    public function removeUploaded()
    {
        if (null === $this->file) {
            return;
        }

        $rmfilei = $this->getUploadRootDir().'/index_'.$this->getFoto();
        $rmfilem = $this->getUploadRootDir().'/mini_'.$this->getFoto();
        $rmfileg = $this->getUploadRootDir().'/grande_'.$this->getFoto();
        $rmfilez = $this->getUploadRootDir().'/thumb_'.$this->getFoto();
        if (file_exists($rmfilei)) {
            unlink($rmfilei);
        }
        if (file_exists($rmfilem)) {
            unlink($rmfilem);
        }
        if (file_exists($rmfileg)) {
            unlink($rmfileg);
        }
        if (file_exists($rmfilez)) {
            unlink($rmfilez);
        }
    }

    /**
     * @ORM\PostRemove
     */
    public function deleteLuceneIndex()
    {
        // Add your code here
    }

    /**
     * @var \Lc\LcBundle\Entity\Friend
     */
    protected $friend1;

    /**
     * @var \Lc\LcBundle\Entity\Friend
     */
    protected $friend2;


    /**
     * Set friend1
     *
     * @param \Lc\LcBundle\Entity\Friend $friend1
     * @return User
     */
    public function setFriend1(\Lc\LcBundle\Entity\Friend $friend1 = null)
    {
        $this->friend1 = $friend1;

        return $this;
    }

    /**
     * Get friend1
     *
     * @return \Lc\LcBundle\Entity\Friend
     */
    public function getFriend1()
    {
        return $this->friend1;
    }

    /**
     * Set friend2
     *
     * @param \Lc\LcBundle\Entity\Friend $friend2
     * @return User
     */
    public function setFriend2(\Lc\LcBundle\Entity\Friend $friend2 = null)
    {
        $this->friend2 = $friend2;

        return $this;
    }

    /**
     * Get friend2
     *
     * @return \Lc\LcBundle\Entity\Friend
     */
    public function getFriend2()
    {
        return $this->friend2;
    }
    /**
     * @var \Lc\LcBundle\Entity\Friend
     */
    protected $chat1;

    /**
     * @var \Lc\LcBundle\Entity\Friend
     */
    protected $chat2;


    /**
     * Set chat1
     *
     * @param \Lc\LcBundle\Entity\Friend $chat1
     * @return User
     */
    public function setChat1(\Lc\LcBundle\Entity\Friend $chat1 = null)
    {
        $this->chat1 = $chat1;

        return $this;
    }

    /**
     * Get chat1
     *
     * @return \Lc\LcBundle\Entity\Friend
     */
    public function getChat1()
    {
        return $this->chat1;
    }

    /**
     * Set chat2
     *
     * @param \Lc\LcBundle\Entity\Friend $chat2
     * @return User
     */
    public function setChat2(\Lc\LcBundle\Entity\Friend $chat2 = null)
    {
        $this->chat2 = $chat2;

        return $this;
    }

    /**
     * Get chat2
     *
     * @return \Lc\LcBundle\Entity\Friend
     */
    public function getChat2()
    {
        return $this->chat2;
    }

    /**
     * Add friend1
     *
     * @param \Lc\LcBundle\Entity\Friend $friend1
     * @return User
     */
    public function addFriend1(\Lc\LcBundle\Entity\Friend $friend1)
    {
        $this->friend1[] = $friend1;

        return $this;
    }

    /**
     * Remove friend1
     *
     * @param \Lc\LcBundle\Entity\Friend $friend1
     */
    public function removeFriend1(\Lc\LcBundle\Entity\Friend $friend1)
    {
        $this->friend1->removeElement($friend1);
    }

    /**
     * Add friend2
     *
     * @param \Lc\LcBundle\Entity\Friend $friend2
     * @return User
     */
    public function addFriend2(\Lc\LcBundle\Entity\Friend $friend2)
    {
        $this->friend2[] = $friend2;

        return $this;
    }

    /**
     * Remove friend2
     *
     * @param \Lc\LcBundle\Entity\Friend $friend2
     */
    public function removeFriend2(\Lc\LcBundle\Entity\Friend $friend2)
    {
        $this->friend2->removeElement($friend2);
    }

    /**
     * Add chat1
     *
     * @param \Lc\LcBundle\Entity\Friend $chat1
     * @return User
     */
    public function addChat1(\Lc\LcBundle\Entity\Friend $chat1)
    {
        $this->chat1[] = $chat1;

        return $this;
    }

    /**
     * Remove chat1
     *
     * @param \Lc\LcBundle\Entity\Friend $chat1
     */
    public function removeChat1(\Lc\LcBundle\Entity\Friend $chat1)
    {
        $this->chat1->removeElement($chat1);
    }

    /**
     * Add chat2
     *
     * @param \Lc\LcBundle\Entity\Friend $chat2
     * @return User
     */
    public function addChat2(\Lc\LcBundle\Entity\Friend $chat2)
    {
        $this->chat2[] = $chat2;

        return $this;
    }

    /**
     * Remove chat2
     *
     * @param \Lc\LcBundle\Entity\Friend $chat2
     */
    public function removeChat2(\Lc\LcBundle\Entity\Friend $chat2)
    {
        $this->chat2->removeElement($chat2);
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    protected $notify;


    /**
     * Add notify
     *
     * @param \Lc\LcBundle\Entity\Notification $notify
     * @return User
     */
    public function addNotify(\Lc\LcBundle\Entity\Notification $notify)
    {
        $this->notify[] = $notify;

        return $this;
    }

    /**
     * Remove notify
     *
     * @param \Lc\LcBundle\Entity\Notification $notify
     */
    public function removeNotify(\Lc\LcBundle\Entity\Notification $notify)
    {
        $this->notify->removeElement($notify);
    }

    /**
     * Get notify
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getNotify()
    {
        return $this->notify;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    protected $notify1;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    protected $notify2;


    /**
     * Add notify1
     *
     * @param \Lc\LcBundle\Entity\Notification $notify1
     * @return User
     */
    public function addNotify1(\Lc\LcBundle\Entity\Notification $notify1)
    {
        $this->notify1[] = $notify1;

        return $this;
    }

    /**
     * Remove notify1
     *
     * @param \Lc\LcBundle\Entity\Notification $notify1
     */
    public function removeNotify1(\Lc\LcBundle\Entity\Notification $notify1)
    {
        $this->notify1->removeElement($notify1);
    }

    /**
     * Get notify1
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getNotify1()
    {
        return $this->notify1;
    }

    /**
     * Add notify2
     *
     * @param \Lc\LcBundle\Entity\Notification $notify2
     * @return User
     */
    public function addNotify2(\Lc\LcBundle\Entity\Notification $notify2)
    {
        $this->notify2[] = $notify2;

        return $this;
    }

    /**
     * Remove notify2
     *
     * @param \Lc\LcBundle\Entity\Notification $notify2
     */
    public function removeNotify2(\Lc\LcBundle\Entity\Notification $notify2)
    {
        $this->notify2->removeElement($notify2);
    }

    /**
     * Get notify2
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getNotify2()
    {
        return $this->notify2;
    }
    /**
     * @var boolean
     */
    protected $broad;


    /**
     * Set broad
     *
     * @param boolean $broad
     * @return User
     */
    public function setBroad($broad)
    {
        $this->broad = $broad;

        return $this;
    }

    /**
     * Get broad
     *
     * @return boolean
     */
    public function getBroad()
    {
        return $this->broad;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->feeling = new \Doctrine\Common\Collections\ArrayCollection();
        $this->fcomment = new \Doctrine\Common\Collections\ArrayCollection();
        $this->flike = new \Doctrine\Common\Collections\ArrayCollection();
        $this->fshare = new \Doctrine\Common\Collections\ArrayCollection();
        $this->gshare = new \Doctrine\Common\Collections\ArrayCollection();
        $this->gcomment = new \Doctrine\Common\Collections\ArrayCollection();
        $this->glike = new \Doctrine\Common\Collections\ArrayCollection();
        $this->gallery = new \Doctrine\Common\Collections\ArrayCollection();
        $this->userdoing = new \Doctrine\Common\Collections\ArrayCollection();
        $this->userlog = new \Doctrine\Common\Collections\ArrayCollection();
        $this->friend1 = new \Doctrine\Common\Collections\ArrayCollection();
        $this->friend2 = new \Doctrine\Common\Collections\ArrayCollection();
        $this->chat1 = new \Doctrine\Common\Collections\ArrayCollection();
        $this->chat2 = new \Doctrine\Common\Collections\ArrayCollection();
        $this->notify1 = new \Doctrine\Common\Collections\ArrayCollection();
        $this->notify2 = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @var boolean
     */
    private $is_verified;


    /**
     * Set is_verified
     *
     * @param boolean $isVerified
     * @return User
     */
    public function setIsVerified($isVerified)
    {
        $this->is_verified = $isVerified;

        return $this;
    }

    /**
     * Get is_verified
     *
     * @return boolean
     */
    public function getIsVerified()
    {
        return $this->is_verified;
    }
}
