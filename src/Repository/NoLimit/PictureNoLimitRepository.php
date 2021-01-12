<?php

namespace App\Repository\NoLimit;

use App\Entity\NoLimit\PictureNoLimit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PictureNoLimit|null find($id, $lockMode = null, $lockVersion = null)
 * @method PictureNoLimit|null findOneBy(array $criteria, array $orderBy = null)
 * @method PictureNoLimit[]    findAll()
 * @method PictureNoLimit[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PictureNoLimitRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PictureNoLimit::class);
    }

    // /**
    //  * @return PictureNoLimit[] Returns an array of PictureNoLimit objects
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
    public function findOneBySomeField($value): ?PictureNoLimit
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
