<?php

namespace BackBundle\Repository;

use BackBundle\Entity\Media;
use BackBundle\Utils\Filter;
use Doctrine\ORM\EntityRepository;

/**
 * Class PersonRepository
 * @package BackBundle\Repository
 */
class PersonRepository extends EntityRepository
{

    /**
     * @param string $query
     * @param $class
     * @return mixed
     */
    public function findLike(string $query, $class)
    {
        return $this->createQueryBuilder('p')
            ->where('p INSTANCE OF ' . $class)
            ->andWhere('p.name LIKE :query or p.firstname LIKE :query')
            ->setParameter('query', "%$query%")
            ->setMaxResults(10)
            ->orderBy('p.name', 'ASC')
            ->addOrderBy('p.firstname', 'ASC')
            ->getQuery()
            ->getResult();
    }



}