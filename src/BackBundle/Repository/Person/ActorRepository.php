<?php

namespace BackBundle\Repository\Person;

use Doctrine\ORM\EntityRepository;

/**
 * Class ActorRepository
 * @package BackBundle\Repository\Person
 */
class ActorRepository extends EntityRepository
{

    /**
     * @param string $query
     * @return array
     */
    public function findLike(string $query)
    {
        return $this->createQueryBuilder('a')
            ->where('a.name LIKE :query or a.firstname LIKE :query')
            ->setParameter('query', "%$query%")
            ->setMaxResults(10)
            ->orderBy('a.name', 'ASC')
            ->orderBy('a.firstname', 'ASC')
            ->getQuery()
            ->getResult();
    }

}