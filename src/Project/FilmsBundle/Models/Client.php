<?php
namespace Project\FilmsBundle\Models;
class Client{
   
   private $client_id;
   private $username;
   private $email;
   private $password;
  
    public function getClient_Id()
    {
        return $this->client_id;
    }

  
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

 
    public function getUsername()
    {
        return $this->username;
    }

  
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

 
    public function getEmail()
    {
        return $this->email;
    }


    public function setPassword($password)
    {
        $this->password =  password_hash ($password,PASSWORD_BCRYPT);

        return $this;
    }


    public function getPassword()
    {
        return $this->password;
    }
   

}
?>