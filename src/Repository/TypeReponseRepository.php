<?php

namespace App\Repository;

use App\Entity\TypeReponse;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TypeReponse|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeReponse|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeReponse[]    findAll()
 * @method TypeReponse[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeReponseRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TypeReponse::class);
    }

//    /**
//     * @return TypeReponse[] Returns an array of TypeReponse objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TypeReponse
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
