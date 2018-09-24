<?php

namespace BackBundle\Entity;

use BackBundle\Traits\DoctrineId;
use BackBundle\Traits\Timestampable;
use Doctrine\ORM\Mapping as ORM;

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

    use DoctrineId;
    use Timestampable;

    /**
     * @var
     * @ORM\Column(type="string")
     */
    protected $title;

    /**
     * @var
     * @ORM\Column(type="text")
     */
    protected $description;

    /**
     * @var
     * @ORM\Column(type="smallint")
     */
    protected $year;

    /**
     * @var Image
     * @ORM\OneToOne(targetEntity="BackBundle\Entity\Image", cascade={"persist"})
     * @ORM\JoinColumn(name="image_id", referencedColumnName="id")
     */
    protected $image;


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
     * Set created.
     *
     * @param \DateTime $created
     *
     * @return Media
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Set updated.
     *
     * @param \DateTime $updated
     *
     * @return Media
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
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
}
