<?php

namespace App\Controller;

use App\Entity\Actions;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TableauBordActionController extends AbstractController
{



    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    #[Route('/tableau/bord/action', name: 'app_tableau_bord_action')]
    public function index(Request $request): Response
    {
        
        $typeAudit = null;
        $DateDebut = null;
        $Datefin=null;
        $notification=null;

        if ($request->isMethod('POST')) 
        {
            
      
              
                $typeAudit = $request->request->get('typeaudit');
                $DateDebut = $request->request->get('datedebut');
                $Datefin = $request->request->get('datefin');
            //  dd($Datefin); 
   
        
        }




        $valeur_audit=$this->entityManager->getRepository(Actions::class)->findRecherchenumber($typeAudit, $DateDebut, $Datefin );

        /* janvier */
        $totalAuditMois1 = null;
        foreach ($valeur_audit as $item) {
            if ($item["mois_audit"] === 1) {
                $totalAuditMois1 = $item["total_audit"];
                break;
            }
        }

          /* fevrier */
        $totalAuditMois2 = null;
        foreach ($valeur_audit as $item2) {
            if ($item2["mois_audit"] === 2) {
                $totalAuditMois2 = $item2["total_audit"];
                break;
            }
        }


         /* Mars */
         $totalAuditMois3 = null;
        foreach ($valeur_audit as $item3) {
              if ($item3["mois_audit"] === 3) {
                   $totalAuditMois3 = $item3["total_audit"];
                   break;
                  }
            }


          /* Avril */
           $totalAuditMois4 = null;
           foreach ($valeur_audit as $item4) {
              if ($item3["mois_audit"] === 4) {
                 $totalAuditMois4 = $item4["total_audit"];
                 break;
                }
            }


              /* Mai */
              $totalAuditMois5 = null;
              foreach ($valeur_audit as $item5) {
                 if ($item5["mois_audit"] === 5) {
                    $totalAuditMois5 = $item5["total_audit"];
                    break;
                   }
               }


              /* Juin */
              $totalAuditMois6 = null;
              foreach ($valeur_audit as $item6) {
                 if ($item6["mois_audit"] === 6) {
                    $totalAuditMois6 = $item6["total_audit"];
                    break;
                   }
               }

              /* Juillet */
              $totalAuditMois7 = null;
              foreach ($valeur_audit as $item7) {
                 if ($item7["mois_audit"] === 7) {
                    $totalAuditMois7 = $item7["total_audit"];
                    break;
                   }
               }


              /* Aout */
              $totalAuditMois8 = null;
              foreach ($valeur_audit as $item8) {
                 if ($item8["mois_audit"] === 8) {
                    $totalAuditMois8 = $item8["total_audit"];
                    break;
                   }
               }


              /* Septembre */
              $totalAuditMois9 = null;
              foreach ($valeur_audit as $item9) {
                 if ($item9["mois_audit"] === 9) {
                    $totalAuditMois9 = $item9["total_audit"];
                    break;
                   }
               }

                 /* Octobre */
              $totalAuditMois10 = null;
              foreach ($valeur_audit as $item10) {
                 if ($item10["mois_audit"] === 10) {
                    $totalAuditMois10 = $item10["total_audit"];
                    break;
                   }
               }

              /* Novembre */
              $totalAuditMois11 = null;
              foreach ($valeur_audit as $item11) {
                 if ($item11["mois_audit"] === 11) {
                    $totalAuditMois11 = $item11["total_audit"];
                    break;
                   }
               }


              /* Decembre */
              $totalAuditMois12 = null;
              foreach ($valeur_audit as $item12) {
                 if ($item12["mois_audit"] === 12) {
                    $totalAuditMois12 = $item12["total_audit"];
                    break;
                   }
               }









        $type_audits=$this->entityManager->getRepository(Actions::class)->findRechercheTypeaudit(); 

        return $this->render('recherche_action/tableaudebord.html.twig', [
            'controller_name' => 'TableauBordActionController',
            'valeur_audit'=>$valeur_audit,
            'totalAuditMois1'=>$totalAuditMois1,
            'totalAuditMois2'=>$totalAuditMois2,
            'totalAuditMois3'=>$totalAuditMois3,
            'totalAuditMois4'=>$totalAuditMois4,
            'totalAuditMois5'=>$totalAuditMois5,
            'totalAuditMois6'=>$totalAuditMois6,
            'totalAuditMois7'=>$totalAuditMois7,
            'totalAuditMois8'=>$totalAuditMois8,
            'totalAuditMois9'=>$totalAuditMois9,
            'totalAuditMois10'=>$totalAuditMois10,
            'totalAuditMois11'=>$totalAuditMois11,
            'totalAuditMois12'=>$totalAuditMois12,
            'type_audits'=> $type_audits,
            'typeAudit'=> $typeAudit,
            'DateDebut'=> $DateDebut,
            'Datefin'=> $Datefin,
            'notification'=>$notification,
        ]);
    }
}
