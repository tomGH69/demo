<?php

namespace BackBundle\Entity\Person;

use BackBundle\Entity\Person;
use Doctrine\ORM\Mapping as ORM;

/**
 * Director
 *
 * @ORM\Entity()
 */
class Director extends Person
{
    /**
     * @ORM\ManyToMany(targetEntity="BackBundle\Entity\Media\Movie", mappedBy="directors")
     */
    private $movies;

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Director
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     *
     * @return Director
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->movies = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add movie
     *
     * @param \BackBundle\Entity\Media\Movie $movie
     *
     * @return Director
     */
    public function addMovie(\BackBundle\Entity\Media\Movie $movie)
    {
        $this->movies[] = $movie;

        return $this;
    }

    /**
     * Remove movie
     *
     * @param \BackBundle\Entity\Media\Movie $movie
     */
    public function removeMovie(\BackBundle\Entity\Media\Movie $movie)
    {
        $this->movies->removeElement($movie);
    }

    /**
     * Get movies
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMovies()
    {
        return $this->movies;
    }
}
