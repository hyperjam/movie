<?php

namespace Project\FilmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity; 

/**
 * Review
* @ORM\Table
* @ORM\Table(name="review", indexes={@ORM\Index(name="film_id", columns={"film_id"})})
 * @ORM\Entity
 */
class Review
{
    /**
     * @var integer
     * @ORM\Column(name="reviewId",type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="review_reviewId_seq", allocationSize=1, initialValue=1)
     */
    private $reviewId;

    /**
     * @var string
     * @ORM\Column(name="review", type="string", length=255,  nullable="true")
     */
    private $review;

    /**
     * @var integer
      * @ORM\Column(name="topreviewed", type="integer", nullable="true")
     */
    private $topreviewed;


    /**
     * @var integer
     *
     * @ORM\Column(name="client_id", type="integer", nullable=false)
     */
    private $client_id;

    /**
     * @ORM\ManyToOne(targetEntity="Project\FilmsBundle\Entity\Film")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="film_id", referencedColumnName="film_id")
     * })
     */
    protected $film_id;


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
     * Set client_id
     *
     * @param integer $client_id
     * @return Review
     */
    public function setClient_Id($client_id)
    {
        $this->client_id = $client_id;
        return $this;
    }
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
     * Set film_id
     *
     * @param Project\FilmsBundle\Entity\Film $film_id
     * @return Review
     */
    public function setFilm_Id(Project\FilmsBundle\Entity\Film $film_id = null)
    {
        $this->film_id = $film_id;
        return $this;
    }
    /**
     * Get film_id
     *
     * @return Project\FilmsBundle\Entity\Film 
     */
    public function getFilm_Id()
    {
        return $this->film_id;
    }
}
