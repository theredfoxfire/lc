<?php

namespace Lc\LcBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * NotificationRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class NotificationRepository extends EntityRepository
{
	public function loadNoty($id2)
	{
		$query = $this->getEntityManager()
			->createQuery('SELECT n FROM
			LcLcBundle:Notification n
			WHERE n.user2 = :id2 AND n.self_page != :id2 OR 
			(n.user1 IN (SELECT IDENTITY (nf.user2) FROM LcLcBundle:Friend nf where nf.user1 = :id2 and 
			nf.is_confirmed = :is and nf.status = :is and nf.cast = :cast) and n.user2 IN (SELECT IDENTITY (na.user2) FROM LcLcBundle:Friend na 
			where na.user1 = :id2 and na.is_confirmed = :is and na.status = :is and na.cast = :cast))
			order by n.created_at DESC'
			)
			->setMaxResults(35)
			->setParameters(array(
						   'id2' => $id2,
						   'is' => 1,
						   'cast' => 0,
							));
 
        try {
            $love = $query->getResult();
        } catch (\Doctrine\Orm\NoResultException $e) {
        $love = null;
          }
 
        return $love;
	}
	
	public function notyCount($id2)
	{
		$query = $this->getEntityManager()
			->createQuery('SELECT n FROM
			LcLcBundle:Notification n
			WHERE n.user2 = :id2 AND n.self_page != :id2 and n.viewed = :vi OR 
			((n.user1 IN (SELECT IDENTITY (nf.user2) FROM LcLcBundle:Friend nf where nf.user1 = :id2 and 
			nf.is_confirmed = :is and nf.status = :is and nf.cast = :cast) and n.user2 IN (SELECT IDENTITY (na.user2) FROM LcLcBundle:Friend na 
			where na.user1 = :id2 and na.is_confirmed = :is and na.status = :is and na.cast = :cast)) and n.viewed = :vi)
			order by n.created_at DESC'
			)
			->setParameters(array(
						   'id2' => $id2,
						   'is' => 1,
						   'vi' => 0,
						   'cast' => 0,
							));
 
        try {
            $love = $query->getResult();
        } catch (\Doctrine\Orm\NoResultException $e) {
        $love = null;
          }
          
        $love = count($love);
 
        return $love;
	}
	
	public function updateNoty($id2)
	{
        $qb = $this->createQueryBuilder('');
		$q = $qb->update('LcLcBundle:Notification', 'n')
        ->set('n.viewed', $qb->expr()->literal(true))
        ->where('n.user2 = :id2 AND n.self_page != :id2 and n.viewed = :vi OR 
			(n.user1 IN (SELECT IDENTITY (nf.user2) FROM LcLcBundle:Friend nf where nf.user1 = :id2 and 
			nf.is_confirmed = :is and nf.status = :is) and n.user2 IN (SELECT IDENTITY (na.user2) FROM LcLcBundle:Friend na 
			where na.user1 = :id2 and na.is_confirmed = :is and na.status = :is))')
        ->setParameter('id2', $id2)
        ->setParameter('vi', 0)
        ->setParameter('is', 1)
        ->getQuery();
		$p = $q->execute();
	}
}
