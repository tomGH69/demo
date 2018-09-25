<?php

namespace BackBundle\Entity\Media;

use BackBundle\Traits\DoctrineId;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;

/**
 * Episode
 *
 * @ORM\Entity()
 */
class Episode
{

    use DoctrineId;
    use TimestampableEntity;

    /**
     * @var
     * @ORM\Column(type="smallint")
     */
    private $season;

    /**
     * @var
     * @ORM\Column(type="smallint")
     */
    private $episode;

    /**
     * @var
     * @ORM\Column(type="string")
     */
    private $title;

    /**
     * @ORM\ManyToOne(targetEntity="BackBundle\Entity\Media\TvShow", inversedBy="episodes")
     * @ORM\JoinColumn(name="tvshow_id", referencedColumnName="id")
     */
    private $tvShow;

    /**
     * @var
     * @ORM\Column(type="smallint")
     */
    private $length;


    /**
     * Set season
     *
     * @param integer $season
     *
     * @return Episode
     */
    public function setSeason(?int $season): Episode
    {
        $this->season = $season;

        return $this;
    }

    /**
     * Get season
     *
     * @return integer
     */
    public function getSeason(): ?int
    {
        return $this->season;
    }

    /**
     * Set episode
     *
     * @param integer $episode
     *
     * @return Episode
     */
    public function setEpisode(?int $episode): Episode
    {
        $this->episode = $episode;

        return $this;
    }

    /**
     * Get episode
     *
     * @return integer
     */
    public function getEpisode(): ?int
    {
        return $this->episode;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Episode
     */
    public function setTitle(?string $title): Episode
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
     * Set tvShow
     *
     * @param \BackBundle\Entity\Media\TvShow $tvShow
     *
     * @return Episode
     */
    public function setTvShow(\BackBundle\Entity\Media\TvShow $tvShow = null): Episode
    {
        $this->tvShow = $tvShow;

        return $this;
    }

    /**
     * Get tvShow
     *
     * @return \BackBundle\Entity\Media\TvShow
     */
    public function getTvShow(): TvShow
    {
        return $this->tvShow;
    }

    /**
     * Set length
     *
     * @param integer $length
     *
     * @return Episode
     */
    public function setLength(?int $length): Episode
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
     * Set created.
     *
     * @param \DateTime $created
     *
     * @return Episode
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
     * @return Episode
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }
}
