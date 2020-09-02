<?php

namespace App\Repository;

use App\Entity\Soumissions;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Soumission|null find($id, $lockMode = null, $lockVersion = null)
 * @method Soumission|null findOneBy(array $criteria, array $orderBy = null)
 * @method Soumission[]    findAll()
 * @method Soumission[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SoumissionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Soumission::class);
    }

    // /**
    //  * @return Soumission[] Returns an array of Soumission objects
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
    public function findOneBySomeField($value): ?Soumission
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
