<?php

namespace BackBundle\Entity\Media;

use BackBundle\Traits\DoctrineIdTrait;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Episode
 *
 * @ORM\Entity()
 */
class Episode
{

    use DoctrineIdTrait;
    use TimestampableEntity;

    /**
     * @var
     * @ORM\Column(type="smallint")
     * @Assert\NotBlank()
     * @Assert\Type("int")
     */
    private $season;

    /**
     * @var
     * @ORM\Column(type="smallint")
     * @Assert\NotBlank()
     * @Assert\Type("int")
     */
    private $episode;

    /**
     * @var
     * @ORM\Column(type="string", nullable=true)
     */
    private $title;

    /**
     * @ORM\ManyToOne(targetEntity="BackBundle\Entity\Media\TvShow", inversedBy="episodes")
     * @ORM\JoinColumn(name="tvshow_id", referencedColumnName="id")
     */
    private $tvShow;

    /**
     * @var
     * @ORM\Column(type="smallint", nullable=true)
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
}
