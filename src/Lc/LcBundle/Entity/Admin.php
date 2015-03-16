<?php

namespace Lc\LcBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Admin
 */
class Admin
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $email;

    /**
     * @var boolean
     */
    private $is_active;

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
     * Set name
     *
     * @param string $name
     * @return Admin
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return Admin
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

    /**
     * Set email
     *
     * @param string $email
     * @return Admin
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
     * Set is_active
     *
     * @param boolean $isActive
     * @return Admin
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
     * Set token
     *
     * @param string $token
     * @return Admin
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
     * @return Admin
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
     * @return Admin
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
    private $admindoing;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $adminlog;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->admindoing = new \Doctrine\Common\Collections\ArrayCollection();
        $this->adminlog = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add admindoing
     *
     * @param \Lc\LcBundle\Entity\Admindoing $admindoing
     * @return Admin
     */
    public function addAdmindoing(\Lc\LcBundle\Entity\Admindoing $admindoing)
    {
        $this->admindoing[] = $admindoing;

        return $this;
    }

    /**
     * Remove admindoing
     *
     * @param \Lc\LcBundle\Entity\Admindoing $admindoing
     */
    public function removeAdmindoing(\Lc\LcBundle\Entity\Admindoing $admindoing)
    {
        $this->admindoing->removeElement($admindoing);
    }

    /**
     * Get admindoing
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAdmindoing()
    {
        return $this->admindoing;
    }

    /**
     * Add adminlog
     *
     * @param \Lc\LcBundle\Entity\Adminlog $adminlog
     * @return Admin
     */
    public function addAdminlog(\Lc\LcBundle\Entity\Adminlog $adminlog)
    {
        $this->adminlog[] = $adminlog;

        return $this;
    }

    /**
     * Remove adminlog
     *
     * @param \Lc\LcBundle\Entity\Adminlog $adminlog
     */
    public function removeAdminlog(\Lc\LcBundle\Entity\Adminlog $adminlog)
    {
        $this->adminlog->removeElement($adminlog);
    }

    /**
     * Get adminlog
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAdminlog()
    {
        return $this->adminlog;
    }
}
