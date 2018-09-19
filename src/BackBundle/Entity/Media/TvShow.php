<?php

namespace BackBundle\Entity\Media;

use BackBundle\Entity\Media;
use Doctrine\ORM\Mapping as ORM;

/**
 * TvShow
 *
 * @ORM\Entity()
 */
class TvShow extends Media
{

    /**
     * @ORM\OneToMany(targetEntity="BackBundle\Entity\Media\Episode", mappedBy="tvShow")
     */
    private $episodes;

    /**
     * @ORM\ManyToMany(targetEntity="BackBundle\Entity\Person\Actor", inversedBy="tvShows")
     * @ORM\JoinTable(name="tvshows_actors")
     */
    protected $actors;

    /**
     * @ORM\ManyToMany(targetEntity="BackBundle\Entity\Person\Director", inversedBy="tvShows")
     * @ORM\JoinTable(name="tvshows_directors")
     */
    protected $directors;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->episodes = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set title
     *
     * @param string $title
     *
     * @return TvShow
     */
    public function setTitle($title)
    {
        $this->title = $title;

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
     * Set description
     *
     * @param string $description
     *
     * @return TvShow
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
     * Set year
     *
     * @param integer $year
     *
     * @return TvShow
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
     * Add episode
     *
     * @param \BackBundle\Entity\Media\Episode $episode
     *
     * @return TvShow
     */
    public function addEpisode(\BackBundle\Entity\Media\Episode $episode)
    {
        $this->episodes[] = $episode;

        return $this;
    }

    /**
     * Remove episode
     *
     * @param \BackBundle\Entity\Media\Episode $episode
     */
    public function removeEpisode(\BackBundle\Entity\Media\Episode $episode)
    {
        $this->episodes->removeElement($episode);
    }

    /**
     * Get episodes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEpisodes()
    {
        return $this->episodes;
    }

    /**
     * Add actor
     *
     * @param \BackBundle\Entity\Person\Actor $actor
     *
     * @return TvShow
     */
    public function addActor(\BackBundle\Entity\Person\Actor $actor)
    {
        $this->actors[] = $actor;

        return $this;
    }

    /**
     * Remove actor
     *
     * @param \BackBundle\Entity\Person\Actor $actor
     */
    public function removeActor(\BackBundle\Entity\Person\Actor $actor)
    {
        $this->actors->removeElement($actor);
    }

    /**
     * Get actors
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getActors()
    {
        return $this->actors;
    }

    /**
     * Add director
     *
     * @param \BackBundle\Entity\Person\Director $director
     *
     * @return TvShow
     */
    public function addDirector(\BackBundle\Entity\Person\Director $director)
    {
        $this->directors[] = $director;

        return $this;
    }

    /**
     * Remove director
     *
     * @param \BackBundle\Entity\Person\Director $director
     */
    public function removeDirector(\BackBundle\Entity\Person\Director $director)
    {
        $this->directors->removeElement($director);
    }

    /**
     * Get directors
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDirectors()
    {
        return $this->directors;
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return TvShow
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }
}
