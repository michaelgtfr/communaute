<?php

namespace App\Repository\NoLimit;

use App\Entity\NoLimit\LinkNoLimit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LinkNoLimit|null find($id, $lockMode = null, $lockVersion = null)
 * @method LinkNoLimit|null findOneBy(array $criteria, array $orderBy = null)
 * @method LinkNoLimit[]    findAll()
 * @method LinkNoLimit[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LinkNoLimitRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LinkNoLimit::class);
    }

    // /**
    //  * @return LinkNoLimit[] Returns an array of LinkNoLimit objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LinkNoLimit
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
