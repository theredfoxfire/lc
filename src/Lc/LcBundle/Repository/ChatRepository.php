<?php

namespace Lc\LcBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * ChatRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ChatRepository extends EntityRepository
{
	public function chat($id1 = null, $id2 = null) {
     $query = $this->createQueryBuilder('c')
            ->where('c.user1 = :id1 OR c.user2 = :id1')
            ->setParameter('id1', $id1)
            ->andWhere('c.user2 = :id2 OR c.user1 = :id2')
            ->setParameter('id2', $id2)
            ->setFirstResult(5)
            ->orderBy('c.created_at', 'ASC')
            ->getQuery();
 
        try {
            $love = $query->getResult();
        } catch (\Doctrine\Orm\NoResultException $e) {
        $love = null;
          }
 
        return $love;
    }
}
