<?php

namespace App\Repository;

use App\Entity\Appoint;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Appoint>
 *
 * @method Appoint|null find($id, $lockMode = null, $lockVersion = null)
 * @method Appoint|null findOneBy(array $criteria, array $orderBy = null)
 * @method Appoint[]    findAll()
 * @method Appoint[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AppointRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Appoint::class);
    }

//    /**
//     * @return Appoint[] Returns an array of Appoint objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Appoint
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
