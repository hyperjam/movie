<?php

namespace Project\FilmsBundle\Entity;



use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity; 

/**
 * Client
 * @ORM\Table()
 * @ORM\Entity
**/
class Client implements UserInterface, \Serializable

{
    /**
     * @var integer
     *
     * @ORM\Column(name="client_id",type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $client_id;

    /**
     * @var string
     * @Assert\NotBlank(message="client.not_blank")
     * @ORM\Column(name ="username",type="string", length=25, unique=true)
     * )
     */
    private $username;

    /**
     * @var string
     * @Assert\NotBlank(message="client.not_blank")
     * @Assert\Regex("/^[^@.]+@[^@]+[.][^@]+$/")
     * @ORM\Column(name="email",type="string", length=25, unique=true )
     */
    private $email;

    /**
     * @var string
    * @Assert\NotBlank(
    *      message="client.not_blank")
    * @ORM\Column(name ="password", type="string", length=255)
    */
    private $password;


    /**
     * Get client_id
     *
     * @return integer 
     */
    public function getClient_Id()
    {
        return $this->client_id;
    }

    /**
     * Set username
     *
     * @param string $username
     * @return Client
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
     * @return Client
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
     * Set password
     *
     * @param string $password
     * @return Client
     */
    public function setPassword($password)
    {
        $this->password =  password_hash ($password,PASSWORD_BCRYPT);

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
     * @inheritDoc
     */
    public function equals(UserInterface $user)
    {
        return $this->username === $user->getUsername();
    }

 public function getSalt(){
        return null;
    }
    public function getRoles(){
        return array('ROLE_USER');
    }
    public function eraseCredentials(){
    }

public function serialize()
    {
        return serialize(array(
            $this->client_id,
            $this->username,
            $this->email,
            $this->password  
        ));
    }
    
    public function unserialize($serialized)
    {
        list(
            $this->client_id,
            $this->username,
            $this->email,
            $this->password     
            ) = unserialize($serialized);
    }


}
