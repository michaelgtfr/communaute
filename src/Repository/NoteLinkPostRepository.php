<?php

namespace App\Repository;

use App\Entity\NoteLinkPost;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method NoteLinkPost|null find($id, $lockMode = null, $lockVersion = null)
 * @method NoteLinkPost|null findOneBy(array $criteria, array $orderBy = null)
 * @method NoteLinkPost[]    findAll()
 * @method NoteLinkPost[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NoteLinkPostRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NoteLinkPost::class);
    }

    // /**
    //  * @return NoteLinkPost[] Returns an array of NoteLinkPost objects
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
    public function findOneBySomeField($value): ?NoteLinkPost
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
