<?php

namespace BackBundle\EventListener;

use BackBundle\Entity\Media;
use BackBundle\Event\MediaEvent;
use Doctrine\Common\EventSubscriber;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use Symfony\Component\Security\Core\Security;

/**
 * Class MediaSubscriber
 * @package BackBundle\EventListener
 */
class MediaSubscriber implements EventSubscriber
{

    private $security;

    /**
     * MediaListener constructor.
     * @param $security
     */
    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    /**
     * @return array|string[]
     */
    public function getSubscribedEvents()
    {
        return [
            "media.prePersist" => [
                ["setOwner", 0],
            ]
        ];
    }

    /**
     * @param MediaEvent $event
     * @return Media
     */
    public function setOwner(MediaEvent $event)
    {
        return $event->getMedia()->setOwner($this->security->getUser());
    }
}