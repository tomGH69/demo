<?php

namespace BackBundle\Event;

use BackBundle\Entity\Media;
use Symfony\Component\EventDispatcher\Event;

class MediaEvent extends Event
{
    protected $media;

    public function __construct(Media $media)
    {
        $this->media = $media;
    }

    public function getMedia(): ?Media
    {
        return $this->media;
    }


    public function setMedia(Media $media): self
    {
        $this->media = $media;

        return $this;
    }
}