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
            ->where('c.user1 = :id1')
            ->setParameter('id1', $id1)
            ->andWhere('c.user2 = :id2')
            ->setParameter('id2', $id2)
            ->andWhere('c.is_delete = :del')
            ->setParameter('del', 0)
            ->setMaxResults(16)
            ->orderBy('c.created_at', 'DESC')
            ->getQuery();
 
        try {
            $love = $query->getResult();
        } catch (\Doctrine\Orm\NoResultException $e) {
        $love = null;
          }
 
        return $love;
    }
    
    public function loadChat($id1 = null, $sender = null) {
     $query = $this->getEntityManager()
			->createQuery('SELECT c FROM
			LcLcBundle:Chat c
			WHERE c.user1 = :id1
			AND c.sender_id != :sender
			AND c.is_delete = :del
			AND c.created_at = (select max(cc.created_at) from LcLcBundle:Chat cc WHERE cc.user1 = c.user2 AND cc.user2 = c.user1
			AND cc.sender_id = c.user2)  group by c.user2 order by c.created_at'
			)
			->setMaxResults(25)
			->setParameters(array(
						   'id1' => $id1,
						   'sender' => $sender,
						   'del' => 0,
							));
 
        try {
            $love = $query->getResult();
        } catch (\Doctrine\Orm\NoResultException $e) {
        $love = null;
          }
 
        return $love;
    }
    
    public function unreadChat($id1 = null, $sender = null) {
     $query = $this->getEntityManager()
			->createQuery('SELECT c FROM
			LcLcBundle:Chat c
			WHERE c.user1 = :id1
			AND c.sender_id != :sender
			AND c.is_read = :is
			AND c.is_delete = :del
			AND c.created_at = (select max(cc.created_at) from LcLcBundle:Chat cc WHERE cc.user1 = c.user2 AND cc.user2 = c.user1
			AND cc.sender_id = c.user2)  group by c.user2 order by c.created_at DESC'
			)
			->setParameters(array(
						   'id1' => $id1,
						   'sender' => $sender,
						   'is' => 0,
						   'del' => 0,
							));
 
        try {
            $love = $query->getResult();
        } catch (\Doctrine\Orm\NoResultException $e) {
        $love = null;
          }
 
        return $love;
    }
    
    public function updateChat($id1 = null, $id2 = null) {
        $qb = $this->createQueryBuilder('');
		$q = $qb->update('LcLcBundle:Chat', 'c')
        ->set('c.is_read', $qb->expr()->literal(true))
        ->where('c.user1 = :id1')
        ->setParameter('id1', $id1)
        ->andWhere('c.user2 = :id2')
        ->setParameter('id2', $id2)
        ->andWhere('c.is_read = :read')
        ->setParameter('read', 0)
        ->getQuery();
		$p = $q->execute();
    }
    
    public function deleteChat($id1 = null, $id2 = null) {
        $qb = $this->createQueryBuilder('');
		$q = $qb->update('LcLcBundle:Chat', 'c')
        ->set('c.is_delete', $qb->expr()->literal(true))
        ->where('c.user1 = :id1 OR c.user2 = :id1')
        ->setParameter('id1', $id1)
        ->andWhere('c.user2 = :id2 OR c.user1 = :id2')
        ->setParameter('id2', $id2)
        ->andWhere('c.is_delete = :del')
        ->setParameter('del', 0)
        ->getQuery();
		$p = $q->execute();
    }
    
    
}
