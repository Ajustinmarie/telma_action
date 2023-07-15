<?php

namespace App\Controller;

use App\Entity\Actions;
use App\Entity\ListePriorite;
use App\Entity\Status;
use App\Entity\TypeAudit;
use App\Entity\TypeDeRisque;
use App\Entity\User;
use App\Entity\ZoneAuditee;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RechercheActionController extends AbstractController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager){
       $this->entityManager = $entityManager;
    }


    #[Route('/recherche/action', name: 'recherche_action')]
    public function index(Request $request): Response
    {

        $liste_users=$this->entityManager->getRepository(User::class)->findUsertotale();
        $Type_audits=$this->entityManager->getRepository(Actions::class)->findRechercheTypeaudit();
        $zone_auditees=$this->entityManager->getRepository(Actions::class)->findRechercheZoneauditee();
        $pilote_actions=$this->entityManager->getRepository(Actions::class)->findRecherchePilote();
        $stat=$this->entityManager->getRepository(Actions::class)->findRechercheStatus();
        $liste_total_actions=$this->entityManager->getRepository(Actions::class)->findAll();
        $priorites=$this->entityManager->getRepository(Actions::class)->findRecherchePriorite();
        $status=$this->entityManager->getRepository(Actions::class)->findRechercheStatus();
        $typeDeRisques=$this->entityManager->getRepository(Actions::class)->findRecherchetype_de_risques();

        $prior=$this->entityManager->getRepository(Actions::class)->findRecherchePriorite();
          
    

if ($request->isMethod('POST')) 
{
    $typeAudit = $request->request->get('type_audit');
    $dateAudit = $request->request->get('date_audit');
    $zoneAudit = $request->request->get('zone_audit');
    $pilote_action = $request->request->get('pilote_action');
    $remarques = $request->request->get('remarques');
    $priorite = $request->request->get('priorite');
    $stat = $request->request->get('status');
    $ID = $request->request->get('ID');
    $Type_de_risque = $request->request->get('type_de_risque');
    $delais = $request->request->get('delais');
    $date_debut_periode= $request->request->get('date_debut_periode');
    $date_fin_periode= $request->request->get('date_fin_periode');  

    $remarques= $request->request->get('remarques');  
    $id= $request->request->get('ID');  
    
   
    
    $prior = $request->request->get('priorite');
    $Type_de_ri = $request->request->get('type_de_risque');
    $zoneAud = $request->request->get('zone_audit');
    $pil_action = $request->request->get('pilote_action');
    $typeAu = $request->request->get('type_audit');
    $del = $request->request->get('delais');
    $date_debut= $request->request->get('date_debut_periode');
    $date_fin= $request->request->get('date_fin_periode');  

    $createur_action=$request->request->get('createur_action');  

    // print_r($createur_action);
    
}

if(isset($typeAudit))
{
    if(!empty($id) AND empty($remarques))
    {
        $actions_recherches=$this->entityManager->getRepository(Actions::class)->findRechercheIdentifiant($id);
    }  
    elseif(empty($id) AND !empty($remarques))
    {
        $actions_recherches=$this->entityManager->getRepository(Actions::class)->findRechercheRemarques($remarques); 
    }
    elseif(!empty($id) AND !empty($remarques))
    {
           $actions_recherches='nope';
    }
    else
    { 
            $actions_recherches=$this->entityManager->getRepository(Actions::class)->findRechercheAction($typeAudit, 
            $zoneAudit, 
            $pilote_action,
            $priorite, 
            $stat, 
            $Type_de_risque,
            $delais,
            $date_debut_periode,
            $date_fin_periode,
            $date_debut,
            $date_fin,
            $createur_action
            );
            // dd($pilote_action);
     }

   
}
else
{
    $actions_recherches=null;
}
       
         if(isset($prior)) { } else{$prior=null;};
         if(isset($Type_de_ri)) { } else{ $Type_de_ri=null;};
         if(isset($zoneAud)) { } else{ $zoneAud=null;};
         if(isset($stat)) { } else{ $stat=null;};
         if(isset($pil_action)) { } else{$pil_action=null;};
         if(isset($typeAu)) { } else{ $typeAu=null;};
         if(isset($dateAudit)) { } else{ $dateAudit=null;};
         if(isset($date_debut)) { } else{  $date_debut=null;};
         if(isset($date_fin)) { } else{  $date_fin=null;};
         if(isset($del)) { } else{  $del=null;};
         if(isset($delais)) { } else{  $delais=null;};
         if(isset($date_debut_periode)) { } else{  $date_debut_periode=null;};
         if(isset($date_fin_periode)) { } else{  $date_fin_periode=null;};
         if(isset($createur_action)) { } else{  $createur_action=null;};

         if(isset($remarques)) { } else{  $remarques=null;};
         if(isset($id)) { } else{  $id=null;};
        
       //  var_dump($createur_action);
         
        return $this->render('recherche_action/index.html.twig', [
            'liste_total_actions' => $liste_total_actions,
            'zone_auditees'=>$zone_auditees,
            'Type_audits'=>$Type_audits,
            'pilote_actions'=>$pilote_actions,
            'priorites'=>$priorites,
            'status'=>$status,
            'typeDeRisques'=>$typeDeRisques,
            'actions_recherches'=>$actions_recherches,
            'delais'=>$delais,
            'date_debut_periode'=>$date_debut_periode,
            'date_fin_periode'=>$date_fin_periode,
            'prior'=>$prior,
            'Type_de_ri'=>$Type_de_ri,
            'zoneAud'=>$zoneAud,
            'stat'=>$stat,
            'pil_action'=>$pil_action,
            'typeAu'=>$typeAu,
            'dateAudit'=>$dateAudit, 
            'del'=>$del,
            'date_debut'=>$date_debut,
            'date_fin'=>$date_fin,
            'liste_users'=>$liste_users,
            'createur_action'=>$createur_action,
            'id'=>$id,
            'remarques'=>$remarques
        ]);
    }
}
