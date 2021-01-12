<?php

namespace App\Repository\Discussion;

use App\Entity\Discussion\VideoDiscussion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method VideoDiscussion|null find($id, $lockMode = null, $lockVersion = null)
 * @method VideoDiscussion|null findOneBy(array $criteria, array $orderBy = null)
 * @method VideoDiscussion[]    findAll()
 * @method VideoDiscussion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VideoDiscussionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VideoDiscussion::class);
    }

    // /**
    //  * @return VideoDiscussion[] Returns an array of VideoDiscussion objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?VideoDiscussion
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
