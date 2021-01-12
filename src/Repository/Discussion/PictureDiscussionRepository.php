<?php

namespace App\Repository\Discussion;

use App\Entity\Discussion\PictureDiscussion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PictureDiscussion|null find($id, $lockMode = null, $lockVersion = null)
 * @method PictureDiscussion|null findOneBy(array $criteria, array $orderBy = null)
 * @method PictureDiscussion[]    findAll()
 * @method PictureDiscussion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PictureDiscussionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PictureDiscussion::class);
    }

    // /**
    //  * @return PictureDiscussion[] Returns an array of PictureDiscussion objects
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
    public function findOneBySomeField($value): ?PictureDiscussion
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
