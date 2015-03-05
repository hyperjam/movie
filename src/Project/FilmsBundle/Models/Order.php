<?php
namespace Project\FilmsBundle\Models;
class Orders{
   
   private $order_id;
   private $clientname;
   private $paymentform;
   private $dateOfpay;
 
    public function getOrder_Id()
    {
        return $this->order_id;
    }


    public function setClientname($clientname)
    {
        $this->clientname = $clientname;

        return $this;
    }


    public function getClientname()
    {
        return $this->clientname;
    }


    public function setPaymentform($paymentform)
    {
        $this->paymentform = $paymentform;

        return $this;
    }


    public function getPaymentform()
    {
        return $this->paymentform;
    }


    public function setDateOfpay($dateOfpay)
    {
        $this->dateOfpay = $dateOfpay;

        return $this;
    }


    public function getDateOfpay()
    {
        return $this->dateOfpay;
    }



}
?>