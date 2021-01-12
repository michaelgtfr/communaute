<?php

namespace App\Repository\Pub;

use App\Entity\Pub\VideoPub;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method VideoPub|null find($id, $lockMode = null, $lockVersion = null)
 * @method VideoPub|null findOneBy(array $criteria, array $orderBy = null)
 * @method VideoPub[]    findAll()
 * @method VideoPub[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VideoPubRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VideoPub::class);
    }

    // /**
    //  * @return VideoPub[] Returns an array of VideoPub objects
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
    public function findOneBySomeField($value): ?VideoPub
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
