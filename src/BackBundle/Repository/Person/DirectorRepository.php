<?php

namespace BackBundle\Repository\Person;

use Doctrine\ORM\EntityRepository;

/**
 * Class DirectorRepository
 * @package BackBundle\Repository\Person
 */
class DirectorRepository extends EntityRepository
{

    /**
     * @param string $query
     * @return mixed
     */
    public function findLike(string $query)
    {
        return $this->createQueryBuilder('d')
            ->where('d.name LIKE :query or d.firstname LIKE :query')
            ->setParameter('query', "%$query%")
            ->setMaxResults(10)
            ->orderBy('d.name', 'ASC')
            ->orderBy('d.firstname', 'ASC')
            ->getQuery()
            ->getResult();
    }

}