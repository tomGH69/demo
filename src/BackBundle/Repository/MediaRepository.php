<?php

namespace BackBundle\Repository;

use BackBundle\Entity\Media;
use BackBundle\Utils\Filter;
use Doctrine\ORM\EntityRepository;

/**
 * Class MediaRepository
 * @package BackBundle\Repository\Media
 */
class MediaRepository extends EntityRepository
{

    /**
     * @param Media $mediaSearcher
     * @param Filter $filterService
     * @return mixed
     */
    public function filter(Media $mediaSearcher, Filter $filterService)
    {
        $qb = $this->createQueryBuilder('m')
            ->where('m INSTANCE OF ' . get_class($mediaSearcher));
        $filterService->likeString('title', $mediaSearcher->getTitle(), $qb);
        $filterService->inCollection('actors', $mediaSearcher->getActors(), $qb);
        $filterService->inCollection('directors', $mediaSearcher->getDirectors(), $qb);

        return $qb->getQuery()
            ->getResult();

    }



}