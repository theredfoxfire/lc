<?php

namespace Lc\LcBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Orderan
 */
class Orderan
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \DateTime
     */
    private $updated_at;

    /**
     * @var boolean
     */
    private $status;

    /**
     * @var string
     */
    private $token;

    /**
     * @var string
     */
    private $note;

    /**
     * @var string
     */
    private $product;

    /**
     * @var string
     */
    private $phone_wa;

    /**
     * @var string
     */
    private $delivery_date;

    /**
     * @var string
     */
    private $order_status;

    /**
     * @var string
     */
    private $payment_status;

    /**
     * @var string
     */
    private $payment_dp;

    /**
     * @var \Lc\LcBundle\Entity\Feeling
     */
    private $feeling;


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
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return Orderan
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
     * @return Orderan
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
     * Set status
     *
     * @param boolean $status
     * @return Orderan
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
     * Set token
     *
     * @param string $token
     * @return Orderan
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
     * Set note
     *
     * @param string $note
     * @return Orderan
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return string 
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set product
     *
     * @param string $product
     * @return Orderan
     */
    public function setProduct($product)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return string 
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Set phone_wa
     *
     * @param string $phoneWa
     * @return Orderan
     */
    public function setPhoneWa($phoneWa)
    {
        $this->phone_wa = $phoneWa;

        return $this;
    }

    /**
     * Get phone_wa
     *
     * @return string 
     */
    public function getPhoneWa()
    {
        return $this->phone_wa;
    }

    /**
     * Set delivery_date
     *
     * @param string $deliveryDate
     * @return Orderan
     */
    public function setDeliveryDate($deliveryDate)
    {
        $this->delivery_date = $deliveryDate;

        return $this;
    }

    /**
     * Get delivery_date
     *
     * @return string 
     */
    public function getDeliveryDate()
    {
        return $this->delivery_date;
    }

    /**
     * Set order_status
     *
     * @param string $orderStatus
     * @return Orderan
     */
    public function setOrderStatus($orderStatus)
    {
        $this->order_status = $orderStatus;

        return $this;
    }

    /**
     * Get order_status
     *
     * @return string 
     */
    public function getOrderStatus()
    {
        return $this->order_status;
    }

    /**
     * Set payment_status
     *
     * @param string $paymentStatus
     * @return Orderan
     */
    public function setPaymentStatus($paymentStatus)
    {
        $this->payment_status = $paymentStatus;

        return $this;
    }

    /**
     * Get payment_status
     *
     * @return string 
     */
    public function getPaymentStatus()
    {
        return $this->payment_status;
    }

    /**
     * Set payment_dp
     *
     * @param string $paymentDp
     * @return Orderan
     */
    public function setPaymentDp($paymentDp)
    {
        $this->payment_dp = $paymentDp;

        return $this;
    }

    /**
     * Get payment_dp
     *
     * @return string 
     */
    public function getPaymentDp()
    {
        return $this->payment_dp;
    }

    /**
     * Set feeling
     *
     * @param \Lc\LcBundle\Entity\Feeling $feeling
     * @return Orderan
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
     * @ORM\PrePersist
     */
    public function setCreatedAtValue()
    {
        // Add your code here
    }

    /**
     * @ORM\PrePersist
     */
    public function setTokenValue()
    {
        // Add your code here
    }

    /**
     * @ORM\PreUpdate
     */
    public function setUpdatedAtValue()
    {
        // Add your code here
    }
}
