<?php

namespace Lc\LcBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * FriendRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class FriendRepository extends EntityRepository
{
	public function check($id1 = null, $id2 = null) {
     $query = $this->createQueryBuilder('f')
            ->where('f.id_1 = :id1')
            ->setParameter('id1', $id1)
            ->andWhere('f.id_2 = :id2')
            ->setParameter('id2', $id2)
            ->setMaxResults(1)
            ->getQuery();
 
        try {
            $love = $query->getResult();
        } catch (\Doctrine\Orm\NoResultException $e) {
        $love = null;
          }
 
        return $love;
    }
}
