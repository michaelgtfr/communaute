<?php

namespace App\Repository;

use App\Entity\AccountParameter;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AccountParameter|null find($id, $lockMode = null, $lockVersion = null)
 * @method AccountParameter|null findOneBy(array $criteria, array $orderBy = null)
 * @method AccountParameter[]    findAll()
 * @method AccountParameter[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AccountParameterRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AccountParameter::class);
    }

    // /**
    //  * @return AccountParameter[] Returns an array of AccountParameter objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AccountParameter
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
