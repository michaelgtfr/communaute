<?php

namespace App\Repository;

use App\Entity\NoteVideoPost;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method NoteVideoPost|null find($id, $lockMode = null, $lockVersion = null)
 * @method NoteVideoPost|null findOneBy(array $criteria, array $orderBy = null)
 * @method NoteVideoPost[]    findAll()
 * @method NoteVideoPost[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NoteVideoPostRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NoteVideoPost::class);
    }

    // /**
    //  * @return NoteVideoPost[] Returns an array of NoteVideoPost objects
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
    public function findOneBySomeField($value): ?NoteVideoPost
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
