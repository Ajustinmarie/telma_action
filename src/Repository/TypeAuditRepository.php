<?php

namespace App\Repository;

use App\Entity\TypeAudit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TypeAudit>
 *
 * @method TypeAudit|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeAudit|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeAudit[]    findAll()
 * @method TypeAudit[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeAuditRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeAudit::class);
    }

    public function save(TypeAudit $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(TypeAudit $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }


    
       /* liste deroulante Type audit */
       /*
       public function findRecherchetype_audit($id): array
       {
           $conn = $this->getEntityManager()->getConnection();
           $sql = "SELECT type_audit FROM actions WHERE id='$id'";
             
           $stmt = $conn->prepare($sql);
           $resultSet = $stmt->executeQuery();
           // returns an array of arrays (i.e. a raw data set)
           return $resultSet->fetchAllAssociative();
       }
       */

//    /**
//     * @return TypeAudit[] Returns an array of TypeAudit objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?TypeAudit
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
