<?php

namespace App\Repository;

use App\Entity\Soum;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Soum|null find($id, $lockMode = null, $lockVersion = null)
 * @method Soum|null findOneBy(array $criteria, array $orderBy = null)
 * @method Soum[]    findAll()
 * @method Soum[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SoumRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Soum::class);
    }

    // /**
    //  * @return Soum[] Returns an array of Soum objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Soum
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
