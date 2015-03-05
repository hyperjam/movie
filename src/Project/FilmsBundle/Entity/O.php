<?php

namespace Project\FilmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * O
* @ORM\Table(name="o") 
 *
 * @ORM\Entity
 */
class O
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $email;

 /**
     * @var string
     * @ORM\Column(name="director", type="string", length=50, nullable=true)
     */
    private $director;
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
     * Set email
     *
     * @param string $email
     * @return O
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
     * Set director
     *
     * @param string $director
     * @return O
     */
    public function setDirector($director)
    {
        $this->director = $director;

        return $this;
    }

    /**
     * Get director
     *
     * @return string 
     */
    public function getDirector()
    {
        return $this->director;
    }
}
