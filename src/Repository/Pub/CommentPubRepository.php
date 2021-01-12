<?php

namespace App\Repository\Pub;

use App\Entity\Pub\commentPub;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CommentPub|null find($id, $lockMode = null, $lockVersion = null)
 * @method CommentPub|null findOneBy(array $criteria, array $orderBy = null)
 * @method CommentPub[]    findAll()
 * @method CommentPub[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CommentPubRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CommentPub::class);
    }

    // /**
    //  * @return CommentPub[] Returns an array of CommentPub objects
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
    public function findOneBySomeField($value): ?CommentPub
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
