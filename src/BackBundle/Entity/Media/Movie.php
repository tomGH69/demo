<?php

namespace BackBundle\Entity\Media;

use BackBundle\Entity\Media;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Movie
 *
 * @ORM\Entity()
 */
class Movie extends Media
{

    /**
     * @var
     * @ORM\Column(type="smallint")
     */
    private $length;

    /**
     * @ORM\ManyToMany(targetEntity="BackBundle\Entity\Person\Actor", inversedBy="movies")
     * @ORM\JoinTable(name="movies_actors")
     */
    protected $actors;

    /**
     * @ORM\ManyToMany(targetEntity="BackBundle\Entity\Person\Director", inversedBy="movies")
     * @ORM\JoinTable(name="movies_directors")
     */
    protected $directors;

    /**
     * Set title
     * @param null|string $title
     * @return Movie
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
     * @return Media
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
     * Set length
     *
     * @param integer $length
     *
     * @return Movie
     */
    public function setLength(?int $length): Movie
    {
        $this->length = $length;

        return $this;
    }

    /**
     * Get length
     *
     * @return integer
     */
    public function getLength(): ?int
    {
        return $this->length;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->actors = new \Doctrine\Common\Collections\ArrayCollection();
        $this->directors = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add actor
     *
     * @param \BackBundle\Entity\Person\Actor $actor
     *
     * @return Movie
     */
    public function addActor(\BackBundle\Entity\Person\Actor $actor): Movie
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
    public function getActors(): Collection
    {
        return $this->actors;
    }

    /**
     * Add director
     *
     * @param \BackBundle\Entity\Person\Director $director
     *
     * @return Movie
     */
    public function addDirector(\BackBundle\Entity\Person\Director $director): Movie
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
    public function getDirectors(): Collection
    {
        return $this->directors;
    }

    /**
     * Set image.
     *
     * @param \BackBundle\Entity\Image|null $image
     *
     * @return Movie
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
