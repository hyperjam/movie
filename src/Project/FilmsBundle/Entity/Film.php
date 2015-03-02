<?php

namespace Project\FilmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity; 

/**
 * Film
 * @ORM\Table(name="film") 
 *
 * @ORM\Entity
 */
class Film 
{
    
    //  @var integer
    //  @ORM\Id @Column(name="film_id",type="integer", unique="true")
    
    // private $film_id;


    /**
     * @var string
     * @ORM\Id
     * @Column(name="titlet", type="string",length="50", unique="true" ) 
     */
    private $titlet;

    /**
     * @var string
     * @ORM\Column(name="title", type="string", length=50, nullable="true")
     */
    private $title;

    /**
     * @var string
     * @ORM\Column(name="director", type="string", length=50, nullable=true)
     */
    private $director;

    /**
     * @var integer
     * @ORM\Column(name="year", type="integer", nullable=true)
     */
    private $year;

    /**
     * @var string
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @var string
     * @ORM\Column(name="genre", type="string", length=50, nullable=true)
     */
    private $genre;

    /**
     * @var float
      * @ORM\Column(name="price", type="float", precision=8, scale=0, nullable=true)
     */
    private $price;

    /**
     * @var string
     * @ORM\Column(name="actors", type="string", length=100, nullable=true)
     */
    private $actors;

    /**
     * @var integer
     * @ORM\Column(name="topborrowed", type="integer", nullable=true)
     */
    private $topborrowed;

// public function serialize()
//     {
//         return serialize(array(
//             $this->film_id,
//             $this->title,
//             $this->director,
//             $this->year,
//             $this->description,  
//              $this->genre, 
//               $this->price,
//                $this->actors,
//                 $this->topborrowed
//         ));
//     }
    
//     public function unserialize($serialized)
//     {
//         list(
//             $this->film_id,
//             $this->title,
//             $this->director,
//             $this->year, 
//             $this->description,  
//             $this->genre, 
//               $this->price,
//                $this->actors,
//                 $this->topborrowed
//             ) = unserialize($serialized);
//     }


  
    //   Get id
     
    //   @return integer 
     
    // public function getFilm_Id()
    // {
    //     return $this->film_id;
    // }

    
    //  Set title
     
    //   @param string $title
    //   @return Film
     
    // public function setTitle($title)
    // {
    //     $this->title = $title;

    //     return $this;
    // }

    /**
     * Get titlet
     *
     * @return string 
      * @return Film
     */
    public function getTitlet()
    {
        return $this->titlet;
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
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set director
     *
     * @param string $director
     * @return Film
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

    /**
     * Set year
     *
     * @param integer $year
     * @return Film
     */

    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get year
     *
     * @return integer 
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Film
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set genre
     *
     * @param string $genre
     * @return Film
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * Get genre
     *
     * @return string 
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * Set price
     *
     * @param float $price
     * @return Film
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set actors
     *
     * @param string $actors
     * @return Film
     */
    public function setActors($actors)
    {
        $this->actors = $actors;

        return $this;
    }

    /**
     * Get actors
     *
     * @return string 
     */
    public function getActors()
    {
        return $this->actors;
    }

    /**
     * Set topborrowed
     *
     * @param integer $topborrowed
     * @return Film
     */
    public function setTopborrowed($topborrowed)
    {
        $this->topborrowed = $topborrowed;

        return $this;
    }

    /**
     * Get topborrowed
     *
     * @return integer 
     */
    public function getTopborrowed()
    {
        return $this->topborrowed;
    }

    /**
     *
     * @ORM\OneToMany(targetEntity="Review", mappedBy="film_id")
     */
    protected $reviewId;


    public function __toString()
{
    return $this->titlet;
}

/**
     *
     * @ORM\OneToMany(targetEntity="Review", mappedBy="titled")
     */
    protected $review_id;

/**
     * Constructor
     */
    public function __construct()
    {
        $this->review_id = new \Doctrine\Common\Collections\ArrayCollection();
    }
    /**
     * Add refleksje
     *
     * @param \Project\FilmBundle\Entity\Review $review_id
     * @return Film
     */
    public function addRefleksje(\Project\FilmBundle\Entity\Review $review_id )
    {
        $this->review_id [] = $review_id ;
        return $this;
    }

     /**
     * Get refleksje
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRefleksje()
    {
        return $this->review_id;
    }
}
