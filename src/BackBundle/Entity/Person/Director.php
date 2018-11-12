<?php

namespace BackBundle\Entity\Person;

use BackBundle\Entity\Person;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     * @ORM\ManyToMany(targetEntity="BackBundle\Entity\Media\TvShow", mappedBy="directors")
     */
    private $tvShows;

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Director
     */
    public function setName(?string $name): Person
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName(): ?string
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
    public function setFirstname(?string $firstname): Person
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->movies = new ArrayCollection();
        $this->tvShows = new ArrayCollection();
    }

    /**
     * Add movie
     *
     * @param \BackBundle\Entity\Media\Movie $movie
     *
     * @return Director
     */
    public function addMovie(\BackBundle\Entity\Media\Movie $movie): Director
    {
        $this->movies[] = $movie;

        return $this;
    }

    /**
     * @param \BackBundle\Entity\Media\Movie $movie
     * @return bool
     */
    public function removeMovie(\BackBundle\Entity\Media\Movie $movie): bool
    {
        return $this->movies->removeElement($movie);
    }

    /**
     * Get movies
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMovies(): Collection
    {
        return $this->movies;
    }

    /**
     * Add tvShow.
     *
     * @param \BackBundle\Entity\Media\TvShow $tvShow
     *
     * @return Director
     */
    public function addTvShow(\BackBundle\Entity\Media\TvShow $tvShow): Director
    {
        $this->tvShows[] = $tvShow;

        return $this;
    }

    /**
     * Remove tvShow.
     *
     * @param \BackBundle\Entity\Media\TvShow $tvShow
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeTvShow(\BackBundle\Entity\Media\TvShow $tvShow): bool
    {
        return $this->tvShows->removeElement($tvShow);
    }

    /**
     * Get tvShows.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTvShows(): Collection
    {
        return $this->tvShows;
    }
}
