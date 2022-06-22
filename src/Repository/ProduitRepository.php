<?php

namespace App\Repository;

use App\Entity\Produit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Produit>
 *
 * @method Produit|null find($id, $lockMode = null, $lockVersion = null)
 * @method Produit|null findOneBy(array $criteria, array $orderBy = null)
 * @method Produit[]    findAll()
 * @method Produit[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProduitRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Produit::class);
    }

    public function add(Produit $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Produit $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function pianodroit()
    {
        return $this->createQueryBuilder('p')
            ->Where('p.type = 2')
            ->getQuery()
            ->getResult()
        ;
    }

    public function pianoaqueue()
    {
        return $this->createQueryBuilder('p')
            ->Where('p.type = 1')
            ->getQuery()
            ->getResult()
        ;
    }

    public function findPrixBySearch(string $query)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.prix < :query')
            ->setParameter('query', $query)
            ->getQuery()
            ->getResult()
            
        ;
    }


//    /**
//     * @return Produit[] Returns an array of Produit objects
//     */
//     public function findByExampleField($value): array
//     {
//         return $this->createQueryBuilder('p')
//             ->andWhere('p.exampleField = :val')
//             ->setParameter('val', $value)
//             ->orderBy('p.id', 'ASC')
//             ->setMaxResults(10)
//             ->getQuery()
//             ->getResult()
//          ;
//      }


//    public function findOneBySomeField($value): ?Produit
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
