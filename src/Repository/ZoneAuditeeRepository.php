<?php

namespace App\Repository;

use App\Entity\ZoneAuditee;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ZoneAuditee>
 *
 * @method ZoneAuditee|null find($id, $lockMode = null, $lockVersion = null)
 * @method ZoneAuditee|null findOneBy(array $criteria, array $orderBy = null)
 * @method ZoneAuditee[]    findAll()
 * @method ZoneAuditee[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ZoneAuditeeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ZoneAuditee::class);
    }

    public function save(ZoneAuditee $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ZoneAuditee $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return ZoneAuditee[] Returns an array of ZoneAuditee objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('z')
//            ->andWhere('z.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('z.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ZoneAuditee
//    {
//        return $this->createQueryBuilder('z')
//            ->andWhere('z.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
