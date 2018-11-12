<?php

namespace BackBundle\Entity\Media;

use BackBundle\Entity\Media;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Movie
 *
 * @ORM\Entity(repositoryClass="BackBundle\Repository\Media\MovieRepository")
 */
class Movie extends Media
{

    /**
     * @ORM\ManyToMany(targetEntity="BackBundle\Entity\Person\Actor", inversedBy="movies")
     * @ORM\JoinTable(name="movies_actors")
     * @Assert\NotBlank(groups={"create"})
     */
    private $actors;

    /**
     * @ORM\ManyToMany(targetEntity="BackBundle\Entity\Person\Director", inversedBy="movies")
     * @ORM\JoinTable(name="movies_directors")
     * @Assert\NotBlank(groups={"create"})
     */
    private $directors;

    /**
     * @var
     * @ORM\Column(type="smallint")
     * @Assert\NotBlank(groups={"create"})
     */
    private $length;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->actors = new \Doctrine\Common\Collections\ArrayCollection();
        $this->directors = new \Doctrine\Common\Collections\ArrayCollection();
    }
    

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
