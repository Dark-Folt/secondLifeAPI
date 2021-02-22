<?php

namespace App\Repository;

use App\Entity\PrimaryEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PrimaryEntity|null find($id, $lockMode = null, $lockVersion = null)
 * @method PrimaryEntity|null findOneBy(array $criteria, array $orderBy = null)
 * @method PrimaryEntity[]    findAll()
 * @method PrimaryEntity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PrimaryEntityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PrimaryEntity::class);
    }

    // /**
    //  * @return PrimaryEntity[] Returns an array of PrimaryEntity objects
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
    public function findOneBySomeField($value): ?PrimaryEntity
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
