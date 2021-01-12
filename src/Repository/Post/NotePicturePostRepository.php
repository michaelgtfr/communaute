<?php

namespace App\Repository\Post;

use App\Entity\Post\NotePicturePost;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method NotePicturePost|null find($id, $lockMode = null, $lockVersion = null)
 * @method NotePicturePost|null findOneBy(array $criteria, array $orderBy = null)
 * @method NotePicturePost[]    findAll()
 * @method NotePicturePost[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NotePicturePostRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NotePicturePost::class);
    }

    // /**
    //  * @return NotePicturePost[] Returns an array of NotePicturePost objects
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
    public function findOneBySomeField($value): ?NotePicturePost
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
