<?php

namespace BackBundle\Repository\Media;

use BackBundle\Entity\Media\TvShow;
use BackBundle\Utils\Filter;
use Doctrine\ORM\EntityRepository;

/**
 * Class TvShowRepository
 * @package BackBundle\Repository\Media
 */
class TvShowRepository extends EntityRepository
{

    /**
     * @param TvShow $tvShowSearcher
     * @param Filter $filterService
     * @return mixed
     */
    public function filter(TvShow $tvShowSearcher, Filter $filterService)
    {
        $qb = $this->createQueryBuilder('m');
        $filterService->likeString('title', $tvShowSearcher->getTitle(), $qb);
        $filterService->inCollection('actors', $tvShowSearcher->getActors(), $qb);
        $filterService->inCollection('directors', $tvShowSearcher->getDirectors(), $qb);

        return $qb->getQuery()
            ->getResult();

    }



}