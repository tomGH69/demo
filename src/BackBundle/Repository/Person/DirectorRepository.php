<?php

namespace BackBundle\Repository\Person;

use Doctrine\ORM\EntityRepository;

class DirectorRepository extends EntityRepository
{

    /**
     * @param $query
     * @return array
     */
    public function findLike($query)
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