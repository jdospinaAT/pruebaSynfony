<?php

namespace App\Repository;

use App\Entity\AplicantOffer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AplicantOffer|null find($id, $lockMode = null, $lockVersion = null)
 * @method AplicantOffer|null findOneBy(array $criteria, array $orderBy = null)
 * @method AplicantOffer[]    findAll()
 * @method AplicantOffer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AplicantOfferRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AplicantOffer::class);
    }

    // /**
    //  * @return AplicantOffer[] Returns an array of AplicantOffer objects
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
    public function findOneBySomeField($value): ?AplicantOffer
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
