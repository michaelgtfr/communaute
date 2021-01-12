<?php

namespace App\Repository\NoLimit;

use App\Entity\NoLimit\CommentNoLimit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CommentNoLimit|null find($id, $lockMode = null, $lockVersion = null)
 * @method CommentNoLimit|null findOneBy(array $criteria, array $orderBy = null)
 * @method CommentNoLimit[]    findAll()
 * @method CommentNoLimit[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CommentNoLimitRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CommentNoLimit::class);
    }

    // /**
    //  * @return CommentNoLimit[] Returns an array of CommentNoLimit objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CommentNoLimit
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
