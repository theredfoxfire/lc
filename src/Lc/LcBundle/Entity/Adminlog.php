<?php

namespace Lc\LcBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Adminlog
 */
class Adminlog
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $login_at;

    /**
     * @var \DateTime
     */
    private $last_login;

    /**
     * @var \DateTime
     */
    private $logout_at;

    /**
     * @var \DateTime
     */
    private $last_logout;

    /**
     * @var string
     */
    private $ip_address;

    /**
     * @var string
     */
    private $mac_address;

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
     * Set login_at
     *
     * @param \DateTime $loginAt
     * @return Adminlog
     */
    public function setLoginAt($loginAt)
    {
        $this->login_at = $loginAt;

        return $this;
    }

    /**
     * Get login_at
     *
     * @return \DateTime 
     */
    public function getLoginAt()
    {
        return $this->login_at;
    }

    /**
     * Set last_login
     *
     * @param \DateTime $lastLogin
     * @return Adminlog
     */
    public function setLastLogin($lastLogin)
    {
        $this->last_login = $lastLogin;

        return $this;
    }

    /**
     * Get last_login
     *
     * @return \DateTime 
     */
    public function getLastLogin()
    {
        return $this->last_login;
    }

    /**
     * Set logout_at
     *
     * @param \DateTime $logoutAt
     * @return Adminlog
     */
    public function setLogoutAt($logoutAt)
    {
        $this->logout_at = $logoutAt;

        return $this;
    }

    /**
     * Get logout_at
     *
     * @return \DateTime 
     */
    public function getLogoutAt()
    {
        return $this->logout_at;
    }

    /**
     * Set last_logout
     *
     * @param \DateTime $lastLogout
     * @return Adminlog
     */
    public function setLastLogout($lastLogout)
    {
        $this->last_logout = $lastLogout;

        return $this;
    }

    /**
     * Get last_logout
     *
     * @return \DateTime 
     */
    public function getLastLogout()
    {
        return $this->last_logout;
    }

    /**
     * Set ip_address
     *
     * @param string $ipAddress
     * @return Adminlog
     */
    public function setIpAddress($ipAddress)
    {
        $this->ip_address = $ipAddress;

        return $this;
    }

    /**
     * Get ip_address
     *
     * @return string 
     */
    public function getIpAddress()
    {
        return $this->ip_address;
    }

    /**
     * Set mac_address
     *
     * @param string $macAddress
     * @return Adminlog
     */
    public function setMacAddress($macAddress)
    {
        $this->mac_address = $macAddress;

        return $this;
    }

    /**
     * Get mac_address
     *
     * @return string 
     */
    public function getMacAddress()
    {
        return $this->mac_address;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return Adminlog
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
     * @return Adminlog
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
     * @return Adminlog
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
