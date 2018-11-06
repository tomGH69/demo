<?php

namespace BackBundle\Utils;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\QueryBuilder;

/**
 * Class Filter
 * @package BackBundle\Utils
 */
class Filter
{

    /**
     * @param string $search
     * @param null|string $value
     * @param QueryBuilder $qb
     * @return bool
     */
    public function likeString(string $search, ?string $value, QueryBuilder &$qb): bool
    {
        if (!empty($value)) {
            $qb->andWhere('m.' . $search . ' LIKE :search')
                ->setParameter('search', "%" . $value . "%");
        }

        return true;
    }

    /**
     * @param string $search
     * @param Collection|null $value
     * @param QueryBuilder $qb
     * @return bool
     */
    public function inCollection(string $search, ?Collection $value, QueryBuilder &$qb): bool
    {
        if (!$value->isEmpty()) {
            $qb->join('m.' . $search, $search)
                ->andWhere($search . ' in (:search)')
                ->setParameter('search', $value);
        }

        return true;
    }

}