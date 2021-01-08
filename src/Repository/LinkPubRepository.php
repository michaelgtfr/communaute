<?php

namespace App\Repository;

use App\Entity\LinkPub;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LinkPub|null find($id, $lockMode = null, $lockVersion = null)
 * @method LinkPub|null findOneBy(array $criteria, array $orderBy = null)
 * @method LinkPub[]    findAll()
 * @method LinkPub[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LinkPubRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LinkPub::class);
    }

    // /**
    //  * @return LinkPub[] Returns an array of LinkPub objects
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
    public function findOneBySomeField($value): ?LinkPub
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
