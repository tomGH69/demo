<?php

namespace BackBundle\Entity\Media;

use BackBundle\Entity\Media;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * TvShow
 *
 * @ORM\Entity()
 */
class TvShow extends Media
{

    /**
     * @ORM\OneToMany(targetEntity="BackBundle\Entity\Media\Episode", mappedBy="tvShow", cascade={"persist"})
     */
    private $episodes;

    /**
     * TvShow constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->episodes = new ArrayCollection();
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return TvShow
     */
    public function setTitle(?string $title): Media
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Media
     */
    public function setDescription(?string $description): Media
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription(): ?string
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
    public function setYear(?int $year): Media
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get year
     *
     * @return integer
     */
    public function getYear(): ?int
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
    public function addEpisode(\BackBundle\Entity\Media\Episode $episode): TvShow
    {
        $this->episodes[] = $episode;

        return $this;
    }

    /**
     * Remove episode
     *
     * @param \BackBundle\Entity\Media\Episode $episode
     */
    public function removeEpisode(\BackBundle\Entity\Media\Episode $episode): void
    {
        $this->episodes->removeElement($episode);
    }

    /**
     * Get episodes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEpisodes(): Collection
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
    public function addActor(\BackBundle\Entity\Person\Actor $actor): TvShow
    {
        $this->actors[] = $actor;

        return $this;
    }

    /**
     * Remove actor
     *
     * @param \BackBundle\Entity\Person\Actor $actor
     */
    public function removeActor(\BackBundle\Entity\Person\Actor $actor): void
    {
        $this->actors->removeElement($actor);
    }

    /**
     * Get actors
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getActors(): Collection
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
    public function addDirector(\BackBundle\Entity\Person\Director $director): TvShow
    {
        $this->directors[] = $director;

        return $this;
    }

    /**
     * Remove director
     *
     * @param \BackBundle\Entity\Person\Director $director
     */
    public function removeDirector(\BackBundle\Entity\Person\Director $director): void
    {
        $this->directors->removeElement($director);
    }

    /**
     * Get directors
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDirectors(): Collection
    {
        return $this->directors;
    }


    /**
     * Set image.
     *
     * @param \BackBundle\Entity\Image|null $image
     *
     * @return TvShow
     */
    public function setImage(\BackBundle\Entity\Image $image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image.
     *
     * @return \BackBundle\Entity\Image|null
     */
    public function getImage()
    {
        return $this->image;
    }
}
