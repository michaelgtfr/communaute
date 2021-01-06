<?php

namespace App\Repository;

use App\Entity\Resulting;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Resulting|null find($id, $lockMode = null, $lockVersion = null)
 * @method Resulting|null findOneBy(array $criteria, array $orderBy = null)
 * @method Resulting[]    findAll()
 * @method Resulting[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ResultingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Resulting::class);
    }

    // /**
    //  * @return Resulting[] Returns an array of Resulting objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Resulting
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
