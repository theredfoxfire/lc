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
            ->where('f.user1 = :id1')
            ->setParameter('id1', $id1)
            ->andWhere('f.user2 = :id2')
            ->setParameter('id2', $id2)
            ->getQuery();
 
        try {
            $love = $query->getSingleResult();
        } catch (\Doctrine\Orm\NoResultException $e) {
        $love = null;
          }
 
        return $love;
    }
    
    public function fall($id) {
     $query = $this->createQueryBuilder('f')
            ->where('f.status = :st')
            ->setParameter('st', 1)
            ->andWhere('f.is_confirmed = :cf')
            ->setParameter('cf', 0)
            ->andWhere('f.user2 = :id2')
            ->setParameter('id2', $id)
            ->getQuery();
        return $query;
    }
    
    public function fallCount($id) {
     $query = $this->createQueryBuilder('f')
            ->where('f.status = :st')
            ->setParameter('st', 1)
            ->andWhere('f.is_confirmed = :cf')
            ->setParameter('cf', 0)
            ->andWhere('f.user2 = :id2')
            ->setParameter('id2', $id)
            ->getQuery();
 
        try {
            $love = $query->getResult();
        } catch (\Doctrine\Orm\NoResultException $e) {
        $love = null;
          }
          
         $love = count($love);
 
        return $love;
    }
    
    public function freez($id) {
     $query = $this->createQueryBuilder('f')
            ->where('f.status = :st')
            ->setParameter('st', 1)
            ->andWhere('f.is_confirmed = :cf')
            ->setParameter('cf', 1)
            ->andWhere('f.cast = :ca')
            ->setParameter('ca', 0)
            ->andWhere('f.user2 = :id2')
            ->setParameter('id2', $id)
            ->getQuery();
 
        return $query;
    }
    
    public function freezCount($id) {
     $query = $this->createQueryBuilder('f')
            ->where('f.status = :st')
            ->setParameter('st', 1)
            ->andWhere('f.is_confirmed = :cf')
            ->setParameter('cf', 1)
            ->andWhere('f.cast = :ca')
            ->setParameter('ca', 0)
            ->andWhere('f.user2 = :id2')
            ->setParameter('id2', $id)
            ->getQuery();
 
        try {
            $love = $query->getResult();
        } catch (\Doctrine\Orm\NoResultException $e) {
        $love = null;
          }
          
        $love = count($love);
 
        return $love;
    }
    
    public function block($id1,$id2) {
		$qb = $this->createQueryBuilder('');
		$q = $qb->update('LcLcBundle:Friend', 'f')
			->set('f.status', $qb->expr()->literal(false))
            ->where('f.user1 = :id1')
            ->setParameter('id1', $id1)
            ->andWhere('f.user2 = :id2')
            ->setParameter('id2', $id2)
            ->andWhere('f.cast = :cast')
            ->setParameter('cast', 0)
            ->getQuery();
 
        $p = $q->execute();
    }
}
