<?php

namespace AppBundle\Entity\Media;

use AppBundle\Traits\DoctrineId;
use Doctrine\ORM\Mapping as ORM;

/**
 * Episode
 *
 * @ORM\Entity()
 */
class Episode
{

    use DoctrineId;

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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Media\TvShow", inversedBy="episodes")
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
    public function setSeason($season)
    {
        $this->season = $season;

        return $this;
    }

    /**
     * Get season
     *
     * @return integer
     */
    public function getSeason()
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
    public function setEpisode($episode)
    {
        $this->episode = $episode;

        return $this;
    }

    /**
     * Get episode
     *
     * @return integer
     */
    public function getEpisode()
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
     * Set tvShow
     *
     * @param \AppBundle\Entity\Media\TvShow $tvShow
     *
     * @return Episode
     */
    public function setTvShow(\AppBundle\Entity\Media\TvShow $tvShow = null)
    {
        $this->tvShow = $tvShow;

        return $this;
    }

    /**
     * Get tvShow
     *
     * @return \AppBundle\Entity\Media\TvShow
     */
    public function getTvShow()
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
    public function setLength($length)
    {
        $this->length = $length;

        return $this;
    }

    /**
     * Get length
     *
     * @return integer
     */
    public function getLength()
    {
        return $this->length;
    }
}