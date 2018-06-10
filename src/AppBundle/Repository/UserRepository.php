<?php

namespace AppBundle\Repository;

/**
 * UserRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UserRepository extends \Doctrine\ORM\EntityRepository {

    /**
     * @param $filter
     * @return \Doctrine\ORM\QueryBuilder
     */
    function search(array $filter) {

        $qb = $this->createQueryBuilder("u")
                ->orderBy("u.id", "DESC");

        if (!empty($filter["search"])) {
            $qb->andWhere("u.email LIKE :search"
                    )
                    ->setParameter(":search", "%".$filter["search"]."%");
        }

        if (isset($filter["disabled"]) && $filter["disabled"] === "on") {
            $qb->andWhere("u.enabled = 0");
        }
        return $qb;
    }

    /**
     * @return mixed
     * @throws \Doctrine\ORM\NoResultException
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    function getCount()
    {
        return $this->createQueryBuilder("u")
            ->select("count(u.id)")
            ->getQuery()
            ->getSingleScalarResult();
    }

    /**
     * @return mixed
     * @throws \Doctrine\ORM\NoResultException
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    function countEnabled()
    {
        return $this->createQueryBuilder("u")
            ->select("count(u.id)")
            ->where("u.enabled = 1")
            ->getQuery()
            ->getSingleScalarResult();
    }

    /**
     * Remove disabled users who have created one month ago
     * @return mixed
     */
    function removeOldDisbaledUsers()
    {
        return $this->createQueryBuilder("u")
            ->delete()
            ->where("u.enabled = 0")
            ->andWhere("u.created < :oneMonthAgo")
            ->setParameter(":oneMonthAgo", new \DateTime("-15 day "))
            ->getQuery()
            ->execute();
    }


}
