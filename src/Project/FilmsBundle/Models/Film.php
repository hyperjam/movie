<?php
namespace Project\FilmsBundle\Models;
class Film{
	private $titlet;
	private $title;
	private $director;
	private $genre;
	private $year;
	private $description;
	private $price;
	private $actors;
	private $topborrowed;

	public function getTitlet()
    {
        return $this->titlet;
    }

    public function setTitlet(\Project\FilmsBundle\Entity\Film $titlet=null )
    {
        $this->titlet = $titlet;
        return $this;
    }
    
    public function getTitle()
    {
        return $this->title;
    }

   
    public function setDirector($director)
    {
        $this->director = $director;

        return $this;
    }

   
    public function getDirector()
    {
        return $this->director;
    }

   

    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

   
    public function getYear()
    {
        return $this->year;
    }

    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

  
    public function getDescription()
    {
        return $this->description;
    }

    
    public function setGenre($genre)
    {
        $this->genre = $genre;

        return $this;
    }

  
    public function getGenre()
    {
        return $this->genre;
    }

 
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }


    public function getPrice()
    {
        return $this->price;
    }


    public function setActors($actors)
    {
        $this->actors = $actors;

        return $this;
    }


    public function getActors()
    {
        return $this->actors;
    }


    public function setTopborrowed($topborrowed)
    {
        $this->topborrowed = $topborrowed;

        return $this;
    }


    public function getTopborrowed()
    {
        return $this->topborrowed;
    }



}



}
?>