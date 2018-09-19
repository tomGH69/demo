<?php

namespace BackBundle\Entity;

use BackBundle\Traits\DoctrineId;
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
     * @var
     * @ORM\Column(type="string")
     */
    protected $image;

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Media
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
     * @return Media
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
     * @return Media
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
     * Set image
     *
     * @param string $image
     *
     * @return Media
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
