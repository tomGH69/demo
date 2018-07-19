<?php

namespace AppBundle\Entity\Media;

use AppBundle\Entity\Media;
use Doctrine\ORM\Mapping as ORM;

/**
 * TvShow
 *
 * @ORM\Entity()
 */
class TvShow extends Media
{

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Media\Episode", mappedBy="tvShow")
     */
    private $episodes;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Person\Actor", inversedBy="tvShows")
     * @ORM\JoinTable(name="tvshows_actors")
     */
    protected $actors;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Person\Director", inversedBy="tvShows")
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
     * @param \AppBundle\Entity\Media\Episode $episode
     *
     * @return TvShow
     */
    public function addEpisode(\AppBundle\Entity\Media\Episode $episode)
    {
        $this->episodes[] = $episode;

        return $this;
    }

    /**
     * Remove episode
     *
     * @param \AppBundle\Entity\Media\Episode $episode
     */
    public function removeEpisode(\AppBundle\Entity\Media\Episode $episode)
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
     * @param \AppBundle\Entity\Person\Actor $actor
     *
     * @return TvShow
     */
    public function addActor(\AppBundle\Entity\Person\Actor $actor)
    {
        $this->actors[] = $actor;

        return $this;
    }

    /**
     * Remove actor
     *
     * @param \AppBundle\Entity\Person\Actor $actor
     */
    public function removeActor(\AppBundle\Entity\Person\Actor $actor)
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
     * @param \AppBundle\Entity\Person\Director $director
     *
     * @return TvShow
     */
    public function addDirector(\AppBundle\Entity\Person\Director $director)
    {
        $this->directors[] = $director;

        return $this;
    }

    /**
     * Remove director
     *
     * @param \AppBundle\Entity\Person\Director $director
     */
    public function removeDirector(\AppBundle\Entity\Person\Director $director)
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
}
