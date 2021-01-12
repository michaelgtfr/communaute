<?php

namespace App\Repository\Discussion;

use App\Entity\Discussion\CommentDiscussion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CommentDiscussion|null find($id, $lockMode = null, $lockVersion = null)
 * @method CommentDiscussion|null findOneBy(array $criteria, array $orderBy = null)
 * @method CommentDiscussion[]    findAll()
 * @method CommentDiscussion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CommentDiscussionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CommentDiscussion::class);
    }

    // /**
    //  * @return CommentDiscussion[] Returns an array of CommentDiscussion objects
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
    public function findOneBySomeField($value): ?CommentDiscussion
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
