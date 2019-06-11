<?php

namespace App\Repository;

use App\Entity\WFMUser;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method WFMUser|null find($id, $lockMode = null, $lockVersion = null)
 * @method WFMUser|null findOneBy(array $criteria, array $orderBy = null)
 * @method WFMUser[]    findAll()
 * @method WFMUser[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WFMUserRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, WFMUser::class);
    }

    // /**
    //  * @return WFMUser[] Returns an array of WFMUser objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('w.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?WFMUser
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
