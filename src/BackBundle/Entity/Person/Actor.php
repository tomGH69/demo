<?php

namespace BackBundle\Entity\Person;

use BackBundle\Entity\Person;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Actor
 *
 * @ORM\Entity()
 */
class Actor extends Person
{

    /**
     * @ORM\ManyToMany(targetEntity="BackBundle\Entity\Media\Movie", mappedBy="actors")
     */
    private $movies;

    /**
     * @ORM\ManyToMany(targetEntity="BackBundle\Entity\Media\TvShow", mappedBy="actors")
     */
    private $tvShows;

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Actor
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
     * @return Actor
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
     * @return Actor
     */
    public function addMovie(\BackBundle\Entity\Media\Movie $movie): Actor
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
     * Add tvShow
     *
     * @param \BackBundle\Entity\Media\TvShow $tvShow
     *
     * @return Actor
     */
    public function addTvShow(\BackBundle\Entity\Media\TvShow $tvShow): Actor
    {
        $this->tvShows[] = $tvShow;

        return $this;
    }

    /**
     * @param \BackBundle\Entity\Media\TvShow $tvShow
     * @return bool
     */
    public function removeTvShow(\BackBundle\Entity\Media\TvShow $tvShow): bool
    {
        return $this->tvShows->removeElement($tvShow);
    }

    /**
     * Get tvShows
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTvShows(): Collection
    {
        return $this->tvShows;
    }
}
