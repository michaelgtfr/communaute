<?php

namespace App\Repository;

use App\Entity\VideoNoLimit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method VideoNoLimit|null find($id, $lockMode = null, $lockVersion = null)
 * @method VideoNoLimit|null findOneBy(array $criteria, array $orderBy = null)
 * @method VideoNoLimit[]    findAll()
 * @method VideoNoLimit[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VideoNoLimitRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VideoNoLimit::class);
    }

    // /**
    //  * @return VideoNoLimit[] Returns an array of VideoNoLimit objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?VideoNoLimit
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
