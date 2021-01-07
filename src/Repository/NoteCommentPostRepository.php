<?php

namespace App\Repository;

use App\Entity\NoteCommentPost;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method NoteCommentPost|null find($id, $lockMode = null, $lockVersion = null)
 * @method NoteCommentPost|null findOneBy(array $criteria, array $orderBy = null)
 * @method NoteCommentPost[]    findAll()
 * @method NoteCommentPost[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NoteCommentPostRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NoteCommentPost::class);
    }

    // /**
    //  * @return NoteCommentPost[] Returns an array of NoteCommentPost objects
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
    public function findOneBySomeField($value): ?NoteCommentPost
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
