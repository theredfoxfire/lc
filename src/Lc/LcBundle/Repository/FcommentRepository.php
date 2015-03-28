<?php

namespace Lc\LcBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Lc\LcBundle\Entity\Fcomment;
/**
 * FcommentRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class FcommentRepository extends EntityRepository
{
	public function getCommentList($user = null, $feel = null){
		$query = $this->createQueryBuilder('c')
		->where('c.user = :uid')
		->setParameter('uid', $user)
		->andWhere('c.feeling = :fe')
		->setParameter('fe', $feel)
		->andWhere('c.is_publish = :is')
		->setParameter('is', 1)
		->setMaxResults(20)
		->orderBy('c.created_at', 'DESC')
		->getQuery();
		
		return $query->getResult();
	}
}
