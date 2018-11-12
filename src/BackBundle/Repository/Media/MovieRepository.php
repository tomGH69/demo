<?php

namespace BackBundle\Repository\Media;

use BackBundle\Entity\Media\Movie;
use BackBundle\Utils\Filter;
use Doctrine\ORM\EntityRepository;

/**
 * Class MovieRepository
 * @package BackBundle\Repository\Media
 */
class MovieRepository extends EntityRepository
{

    /**
     * @param Movie $movieSearcher
     * @param Filter $filterService
     * @return mixed
     */
    public function filter(Movie $movieSearcher, Filter $filterService)
    {
        $qb = $this->createQueryBuilder('m');
        $filterService->likeString('title', $movieSearcher->getTitle(), $qb);
        $filterService->inCollection('actors', $movieSearcher->getActors(), $qb);
        $filterService->inCollection('directors', $movieSearcher->getDirectors(), $qb);

        return $qb->getQuery()
            ->getResult();

    }



}