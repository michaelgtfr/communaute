<?php

namespace App\Repository\Pub;

use App\Entity\Pub\PicturePub;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PicturePub|null find($id, $lockMode = null, $lockVersion = null)
 * @method PicturePub|null findOneBy(array $criteria, array $orderBy = null)
 * @method PicturePub[]    findAll()
 * @method PicturePub[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PicturePubRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PicturePub::class);
    }

    // /**
    //  * @return PicturePub[] Returns an array of PicturePub objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PicturePub
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
