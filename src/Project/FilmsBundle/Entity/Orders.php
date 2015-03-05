<?php

namespace Project\FilmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Orders
 * @ORM\Table
 *@ORM\Table(name="orders", indexes={@ORM\Index(name="titlet", columns={"titlet"})})
 * @ORM\Entity
 */
class Orders
{

    /**
     * @var integer
     * @ORM\Column(name="order_id",type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $order_id;

    /**
     * @ORM\ManyToOne(targetEntity="Project\FilmsBundle\Entity\Film")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="titlet", referencedColumnName="titlet")
     * })
     */
    protected $titlet;

    /**
     * @var string
    * @ORM\Column(name="clientname", type="string", length=255)
     */
    private $clientname;

    /**
     * @var string
     * @ORM\Column(name="paymentform", type="string", length=255)
     */
    private $paymentform;

    /**
     * @var \DateTime
     * @ORM\Column(name="dateOfpay", type="datetime", length=255)
     */
    private $dateOfpay;


    /**
     * Get order_id
     *
     * @return integer 
     */
    public function getOrder_Id()
    {
        return $this->order_id;
    }

    /**
     * Set clientname
     *
     * @param string $clientname
     * @return Orders
     */
    public function setClientname($clientname)
    {
        $this->clientname = $clientname;

        return $this;
    }

    /**
     * Get clientname
     *
     * @return string 
     */
    public function getClientname()
    {
        return $this->clientname;
    }

    /**
     * Set paymentform
     *
     * @param string $paymentform
     * @return Orders
     */
    public function setPaymentform($paymentform)
    {
        $this->paymentform = $paymentform;

        return $this;
    }

    /**
     * Get paymentform
     *
     * @return string 
     */
    public function getPaymentform()
    {
        return $this->paymentform;
    }

    /**
     * Set dateOfpay
     *
     * @param \DateTime $dateOfpay
     * @return Orders
     */
    public function setDateOfpay($dateOfpay)
    {
        $this->dateOfpay = $dateOfpay;

        return $this;
    }

    /**
     * Get dateOfpay
     *
     * @return \DateTime 
     */
    public function getDateOfpay()
    {
        return $this->dateOfpay;
    }

    /**
     * Set titlet
     *
     * @param \Project\FilmsBundle\Entity\Film $titlet
     * @return Review
     */
    public function setTitlet(\Project\FilmsBundle\Entity\Film $titlet=null )
    {
        $this->titlet = $titlet;
        return $this;
    }
    
    /**
     * Get titlet
     *
     * @return \Project\FilmsBundle\Entity\Film 
     */
    public function getTitlet()
    {
        return $this->titlet;
    }

}
