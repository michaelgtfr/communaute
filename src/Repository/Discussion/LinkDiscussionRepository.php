<?php

namespace App\Repository\Discussion;

use App\Entity\Discussion\LinkDiscussion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LinkDiscussion|null find($id, $lockMode = null, $lockVersion = null)
 * @method LinkDiscussion|null findOneBy(array $criteria, array $orderBy = null)
 * @method LinkDiscussion[]    findAll()
 * @method LinkDiscussion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LinkDiscussionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LinkDiscussion::class);
    }

    // /**
    //  * @return LinkDiscussion[] Returns an array of LinkDiscussion objects
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
    public function findOneBySomeField($value): ?LinkDiscussion
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
