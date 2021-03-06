<?php

namespace Wealthbot\AdminBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Wealthbot\AdminBundle\Entity\CeModel;

/**
 * CeModelRepository.
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CeModelRepository extends EntityRepository
{
    public function getModelsCountByParentIdAndOwnerId($parentId, $ownerId)
    {
        $qb = $this->createQueryBuilder('cm')
            ->select('count(cm.id)')
            ->andWhere('cm.parentId = :parentId')
            ->andWhere('cm.ownerId = :ownerId')
            ->andWhere('cm.isDeleted = 0')
            ->setParameter('parentId', $parentId)
            ->setParameter('ownerId', $ownerId)
            ->getQuery();

        return $qb->getSingleScalarResult();
    }

    public function getModelsByParentId($parentId)
    {
        $qb = $this->createQueryBuilder('cm')
            ->andWhere('cm.parentId = :parentId')
            ->setParameter('parentId', $parentId)
            ->andWhere('cm.isDeleted = 0')
            ->getQuery();

        return $qb->getResult();
    }

    public function isExistRiskRating($parentId, $ownerId, $riskRating, $excludeId)
    {
        $qb = $this->createQueryBuilder('cm')
            ->andWhere('cm.parentId = :parentId')
            ->andWhere('cm.id != :excludeId')
            ->andWhere('cm.riskRating = :riskRating')
            ->andWhere('cm.ownerId = :ownerId')
            ->setParameter('parentId', $parentId)
            ->setParameter('ownerId', $ownerId)
            ->setParameter('excludeId', $excludeId)
            ->setParameter('riskRating', $riskRating)
            ->setMaxResults(1)
            ->getQuery();

        return $qb->getOneOrNullResult();
    }

    public function getStrategyParentModels()
    {
        $qb = $this->createQueryBuilder('cm')
            ->andWhere('cm.parentId IS NULL')
            ->andWhere('cm.type = :type')
            ->andWhere('cm.ownerId IS NULL')
            ->andWhere('cm.isDeleted = 0')
            ->setParameter('type', CeModel::TYPE_STRATEGY)
            ->getQuery();

        return $qb->getResult();
    }

    public function getStrategyModelBySlug($slug)
    {
        $qb = $this->createQueryBuilder('cm')
            ->andWhere('cm.type = :type')
            ->andWhere('cm.ownerId IS NULL')
            ->andWhere('cm.slug = :slug')
            ->andWhere('cm.isDeleted = 0')
            ->setParameter('type', CeModel::TYPE_STRATEGY)
            ->setParameter('slug', $slug)
            ->getQuery();

        return $qb->getOneOrNullResult();
    }

    public function findCompletedModelByParentIdAndOwnerId($parentId, $ownerId)
    {
        $qb = $this->createQueryBuilder('m');

        $qb->select('m')
            ->leftJoin('m.parent', 'p')
            ->leftJoin('m.modelEntities', 'me')
            ->where('p.id = :parent_id')
            ->andWhere('m.ownerId = :ownerId')
            ->having('SUM(me.percent) = :percents')
            ->groupBy('m.id')
            ->setParameters([
                'parent_id' => $parentId,
                'percents' => 100,
                'ownerId' => $ownerId,
            ])
            ->setMaxResults(1);

        return $qb->getQuery()->getOneOrNullResult();
    }

    public function findModelWithoutRiskRatingByRiaId($riaId)
    {
        $qb = $this->createQueryBuilder('cm')
            ->where('cm.ownerId = :ownerId')
            ->andWhere('cm.riskRating = :riskRating')
            ->andWhere('cm.parentId IS NOT NULL')
            ->andWhere('cm.isDeleted = :isDeleted')
            ->setParameter('ownerId', $riaId)
            ->setParameter('riskRating', 0)
            ->setParameter('isDeleted', 0);

        return $qb->getQuery()->getResult();
    }
}
