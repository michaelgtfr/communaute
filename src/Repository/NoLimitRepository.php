<?php

namespace App\Repository;

use App\Entity\NoLimit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method NoLimit|null find($id, $lockMode = null, $lockVersion = null)
 * @method NoLimit|null findOneBy(array $criteria, array $orderBy = null)
 * @method NoLimit[]    findAll()
 * @method NoLimit[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NoLimitRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NoLimit::class);
    }

    // /**
    //  * @return NoLimit[] Returns an array of NoLimit objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('n.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?NoLimit
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
