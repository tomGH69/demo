<?php

namespace BackBundle\Entity;

use BackBundle\Traits\DoctrineIdTrait;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Media
 *
 * @ORM\Table(name="media")
 * @ORM\Entity()
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap({"movie" = "BackBundle\Entity\Media\Movie", "tvshow" = "BackBundle\Entity\Media\TvShow"})
 */
abstract class Media
{

    use DoctrineIdTrait;
    use TimestampableEntity;

    /**
     * @var
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    protected $title;

    /**
     * @var
     * @ORM\Column(type="text")
     * @Assert\NotBlank()
     */
    protected $description;

    /**
     * @var
     * @ORM\Column(type="smallint")
     * @Assert\NotBlank()
     */
    protected $year;

    /**
     * @var Image
     * @ORM\OneToOne(targetEntity="BackBundle\Entity\Image", cascade={"persist"})
     * @ORM\JoinColumn(name="image_id", referencedColumnName="id")
     * @Assert\NotBlank()
     */
    protected $image;


    /**
     * @ORM\ManyToMany(targetEntity="BackBundle\Entity\Person\Actor", inversedBy="medias")
     * @ORM\JoinTable(name="medias_actors")
     * @Assert\NotBlank()
     */
    protected $actors;

    /**
     * @ORM\ManyToMany(targetEntity="BackBundle\Entity\Person\Director", inversedBy="medias")
     * @ORM\JoinTable(name="medias_directors")
     * @Assert\NotBlank()
     */
    protected $directors;

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
     *
     * @param string $title
     *
     * @return Media
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
     * Set image.
     *
     * @param \BackBundle\Entity\Image|null $image
     *
     * @return Media
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

    /**
     * Add actor.
     *
     * @param \BackBundle\Entity\Person\Actor $actor
     *
     * @return Media
     */
    public function addActor(\BackBundle\Entity\Person\Actor $actor)
    {
        $this->actors[] = $actor;

        return $this;
    }

    /**
     * Remove actor.
     *
     * @param \BackBundle\Entity\Person\Actor $actor
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeActor(\BackBundle\Entity\Person\Actor $actor)
    {
        return $this->actors->removeElement($actor);
    }

    /**
     * Get actors.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getActors()
    {
        return $this->actors;
    }

    /**
     * Add director.
     *
     * @param \BackBundle\Entity\Person\Director $director
     *
     * @return Media
     */
    public function addDirector(\BackBundle\Entity\Person\Director $director)
    {
        $this->directors[] = $director;

        return $this;
    }

    /**
     * Remove director.
     *
     * @param \BackBundle\Entity\Person\Director $director
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeDirector(\BackBundle\Entity\Person\Director $director)
    {
        return $this->directors->removeElement($director);
    }

    /**
     * Get directors.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDirectors()
    {
        return $this->directors;
    }
}
