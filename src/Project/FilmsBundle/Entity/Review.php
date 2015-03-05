<?php

namespace Project\FilmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity; 

/**
 * Review
* @ORM\Table
* @ORM\Table(name="review", indexes={@ORM\Index(name="titlet", columns={"titlet"})})
 * @ORM\Entity
 */
class Review
{
    /**
     * @var integer
     * @ORM\Column(name="reviewId",type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $reviewId;

    /**
     * @var string
     * @ORM\Column(name="review", type="string", length=255)
     */
    private $review;

    /**
     * @var integer
      * @ORM\Column(name="topreviewed", type="integer" )
     */
    private $topreviewed;


    /**
     * @var string
     *
     * @ORM\Column(name="author", type="string")
     */
    private $author;

    /**
     * @ORM\ManyToOne(targetEntity="Project\FilmsBundle\Entity\Film")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="titlet", referencedColumnName="titlet")
     * })
     */
    protected $titlet;




    /**
     * Get reviewId
     *
     * @return integer 
     */
    public function getReviewId()
    {
        return $this->reviewId;
    }

    /**
     * Set review
     *
     * @param string $review
     * @return Review
     */
    public function setReview($review)
    {
        $this->review = $review;

        return $this;
    }

    /**
     * Get review
     *
     * @return string 
     */
    public function getReview()
    {
        return $this->review;
    }

    
    /**
     * Set topreviewed
     *
     * @param integer $topreviewed
     * @return Review
     */
    public function setTopreviewed($topreviewed)
    {
        $this->topreviewed = $topreviewed;

        return $this;
    }

    /**
     * Get topreviewed
     *
     * @return integer 
     */
    public function getTopreviewed()
    {
        return $this->topreviewed;
    }
    /**
     * Set author
     *
     * @param string $author
     * @return Review
     */
    public function setAuthor($author)
    {
        $this->author = $author;
        return $this;
    }
    /**
     * Get author
     *
     * @return integer 
     */
    public function getAuthor()
    {
        return $this->author;
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
