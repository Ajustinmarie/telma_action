<?php

namespace App\Repository;

use App\Entity\Actions;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Actions>
 *
 * @method Actions|null find($id, $lockMode = null, $lockVersion = null)
 * @method Actions|null findOneBy(array $criteria, array $orderBy = null)
 * @method Actions[]    findAll()
 * @method Actions[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ActionsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Actions::class);
    }

    public function save(Actions $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Actions $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findRechercheIdentifiant($id): array
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql = "SELECT * FROM actions WHERE id='$id'";
          
        $stmt = $conn->prepare($sql);
        $resultSet = $stmt->executeQuery();
        // returns an array of arrays (i.e. a raw data set)
        return $resultSet->fetchAllAssociative();
    }

    /* liste deroulante Zone_auditee */
    public function findRecherchezoneaudit($id): array
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql = "SELECT zone_auditee FROM actions WHERE id='$id'";
          
        $stmt = $conn->prepare($sql);
        $resultSet = $stmt->executeQuery();
        // returns an array of arrays (i.e. a raw data set)
        return $resultSet->fetchAllAssociative();
    }

      /* liste deroulante Type audit */
    public function findRecherchetype_audit($id): array
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql = "SELECT type_audit FROM actions WHERE id='$id'";
          
        $stmt = $conn->prepare($sql);
        $resultSet = $stmt->executeQuery();
        // returns an array of arrays (i.e. a raw data set)
        return $resultSet->fetchAllAssociative();
    }

        /* liste deroulante Pilote action */
        public function findRecherchepilote_action($id): array
        {
            $conn = $this->getEntityManager()->getConnection();
            $sql = "SELECT pilote_de_laction FROM actions WHERE id='$id'";
              
            $stmt = $conn->prepare($sql);
            $resultSet = $stmt->executeQuery();
            // returns an array of arrays (i.e. a raw data set)
            return $resultSet->fetchAllAssociative();
        }

                
             /* liste deroulante priorite */
            public function findRechercheprioriter($id): array
            {
                    $conn = $this->getEntityManager()->getConnection();
                    $sql = "SELECT priorite FROM actions WHERE id='$id'";
                      
                    $stmt = $conn->prepare($sql);
                    $resultSet = $stmt->executeQuery();
                    // returns an array of arrays (i.e. a raw data set)
                    return $resultSet->fetchAllAssociative();
            }


                /* liste deroulante processus */
                public function findRechercheprocessus($id): array
                     {
                        $conn = $this->getEntityManager()->getConnection();
                        $sql = "SELECT processus FROM actions WHERE id='$id'";
                                      
                        $stmt = $conn->prepare($sql);
                        $resultSet = $stmt->executeQuery();
                         // returns an array of arrays (i.e. a raw data set)
                         return $resultSet->fetchAllAssociative();
                      }

                
                /* liste deroulante status */
                 public function findRecherchestatut($id): array
                     {
                         $conn = $this->getEntityManager()->getConnection();
                         $sql = "SELECT status FROM actions WHERE id='$id'";
                                               
                         $stmt = $conn->prepare($sql);
                         $resultSet = $stmt->executeQuery();
                                  // returns an array of arrays (i.e. a raw data set)
                        return $resultSet->fetchAllAssociative();
                      }



                /* liste deroulante type_de_risque */
                 public function findRecherchetype_de_risque($id): array
                 {
                     $conn = $this->getEntityManager()->getConnection();
                     $sql = "SELECT type_de_risques FROM actions WHERE id='$id'";
                                           
                     $stmt = $conn->prepare($sql);
                     $resultSet = $stmt->executeQuery();
                              // returns an array of arrays (i.e. a raw data set)
                    return $resultSet->fetchAllAssociative();
                  }


                  /* Nombre d'action en cours */
                  public function findNb_action_en_cours($name_firstame): array
                  {
                      $conn = $this->getEntityManager()->getConnection();
                      $status='en cours';
                      $sql = "SELECT COUNT(status) FROM actions WHERE status='$status' AND pilote_de_laction='$name_firstame'";
                                            
                      $stmt = $conn->prepare($sql);
                      $resultSet = $stmt->executeQuery();
                               // returns an array of arrays (i.e. a raw data set)
                     return $resultSet->fetchAllAssociative();
                   }
                    /* Nombre d'action en cours */



                 /* Nombre d'action cloturée */
                  public function findNb_action_cloturee($name_firstame): array
                  {
                      $conn = $this->getEntityManager()->getConnection();
                      $status='cloturée';
                      $sql = "SELECT COUNT(status) FROM actions WHERE status='$status' AND pilote_de_laction='$name_firstame'";
                                            
                      $stmt = $conn->prepare($sql);
                      $resultSet = $stmt->executeQuery();
                               // returns an array of arrays (i.e. a raw data set)
                     return $resultSet->fetchAllAssociative();
                   }
                    /* Nombre d'action en cours */



    public function findRechercheRemarques($remarques): array
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql = "SELECT * FROM actions WHERE remarques_commentaires  LIKE '%$remarques%'";
          
        $stmt = $conn->prepare($sql);
        $resultSet = $stmt->executeQuery();
        // returns an array of arrays (i.e. a raw data set)
        return $resultSet->fetchAllAssociative();
    }
     




    public function findRecherchePilote(): array
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql = "SELECT DISTINCT(pilote_de_laction) FROM actions";
          
        $stmt = $conn->prepare($sql);
        $resultSet = $stmt->executeQuery();
        // returns an array of arrays (i.e. a raw data set)
        return $resultSet->fetchAllAssociative();
    }


    public function findRechercheStatus(): array
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql = "SELECT DISTINCT(status) FROM actions";
          
        $stmt = $conn->prepare($sql);
        $resultSet = $stmt->executeQuery();
        // returns an array of arrays (i.e. a raw data set)
        return $resultSet->fetchAllAssociative();
    }


    public function findRechercheTypeaudit(): array
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql = "SELECT DISTINCT(type_audit) FROM actions";
          
        $stmt = $conn->prepare($sql);
        $resultSet = $stmt->executeQuery();
        // returns an array of arrays (i.e. a raw data set)
        return $resultSet->fetchAllAssociative();
    }


    public function findRechercheZoneauditee(): array
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql = "SELECT DISTINCT(zone_auditee) FROM actions";
          
        $stmt = $conn->prepare($sql);
        $resultSet = $stmt->executeQuery();
        // returns an array of arrays (i.e. a raw data set)
        return $resultSet->fetchAllAssociative();
    }


    public function findRecherchePriorite(): array
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql = "SELECT DISTINCT(priorite) FROM actions";
        $stmt = $conn->prepare($sql);
        $resultSet = $stmt->executeQuery();
        // returns an array of arrays (i.e. a raw data set)
        return $resultSet->fetchAllAssociative();
    }


    public function findRecherchetype_de_risques(): array
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql = "SELECT DISTINCT(type_de_risques) FROM actions";
        $stmt = $conn->prepare($sql);
        $resultSet = $stmt->executeQuery();
        // returns an array of arrays (i.e. a raw data set)
        return $resultSet->fetchAllAssociative();
    }


    public function findRecherchenumber($typeAudit, $DateDebut, $Datefin ): array
    {
        $conn = $this->getEntityManager()->getConnection();
        $sql = "SELECT MONTH(date_de_laudit) AS mois_audit, COUNT(*) AS total_audit
        FROM actions
        WHERE date_de_laudit BETWEEN '$DateDebut' AND '$Datefin'
        AND type_audit = '$typeAudit'
        GROUP BY mois_audit;";
        $stmt = $conn->prepare($sql);
        $resultSet = $stmt->executeQuery();
        // returns an array of arrays (i.e. a raw data set)
        return $resultSet->fetchAllAssociative();
    }
 
     
    public function findRechercheAction($typeAudit, 
                                            $zoneAudit, 
                                            $pilote_actions,
                                            $priorite, 
                                            $stat, 
                                            $Type_de_risque,
                                            $delais,
                                            $date_debut_periode,
                                            $date_fin_periode,
                                            $date_debut,
                                            $date_fin,
                                            $createur_action): array
                                            {


       if(empty($zoneAudit)){ $cas1='';}else{$cas1 = "AND zone_auditee='$zoneAudit'";};
       if(empty($pilote_actions)){ $cas2='';} else { $cas2 = "AND pilote_de_laction='$pilote_actions'";};
       if(empty($stat)){ $cas3='';} else { $cas3 = "AND status='$stat'";};
       if(empty($priorite)){ $cas4='';}else{ $cas4 = "AND priorite='$priorite'";};
       if(empty($Type_de_risque)){ $cas5='';} else { $cas5 = "AND type_de_risques='$Type_de_risque'";};
       if(empty($delais)){ $cas6='';} else { $cas6 = "AND delais<='$delais'";};
       if(empty($createur_action) ){ $cas7=''; } else { $cas7 = "AND id_createur_de_actions='$createur_action'";};


       if(empty($date_debut_periode) AND empty($date_fin_periode))
        {
        $cas8='';
        }
        elseif(!empty($date_debut_periode) AND empty($date_fin_periode))
        {
         $cas8 = "AND  date_de_laudit>='$date_debut_periode'";
        }
        elseif(empty($date_debut_periode) AND !empty($date_fin_periode))
        {
         $cas8 = "AND  date_de_laudit<='$date_fin_periode'";
        }
        elseif(!empty($date_debut_periode) AND !empty($date_fin_periode))
        {
         $cas8 = " AND date_de_laudit BETWEEN '$date_debut_periode' AND '$date_fin_periode'";
        };


        $conn = $this->getEntityManager()->getConnection();
        $sql = "SELECT * FROM actions WHERE type_audit='$typeAudit' 
                                               $cas1 $cas2 $cas4 $cas3 $cas5 $cas6 $cas7 $cas8
                                            "; 
        $stmt = $conn->prepare($sql);
    
        $resultSet = $stmt->executeQuery();
        // returns an array of arrays (i.e. a raw data set)
        return $resultSet->fetchAllAssociative();
    }


    












//    /**
//     * @return Actions[] Returns an array of Actions objects
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

//    public function findOneBySomeField($value): ?Actions
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
