<?php

namespace App\Controller;

use App\Entity\Actions;
use App\Entity\ListePriorite;
use App\Entity\Processus;
use App\Entity\Status;
use App\Entity\TypeAudit;
use App\Entity\TypeDeRisque;
use App\Entity\User;
use App\Entity\ZoneAuditee;
use App\Form\FormModificationActionsType;
use App\Repository\ListePrioriteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class ModificationFicheActionController extends AbstractController{

                private $entityManager;

                public function __construct(EntityManagerInterface $entityManager)
                {
                      $this->entityManager = $entityManager;
                }

                #[Route('/modification/fiche/action/{id}', name: 'modification_fiche_action')]
                public function index($id, Request $request): Response
                {

                            $actions_recherches=$this->entityManager->getRepository(Actions::class)->findRechercheIdentifiant($id);

                                 /* liste deroulante Type audit */
                                 $actions_type_audit=$this->entityManager->getRepository(Actions::class)->findRecherchetype_audit($id);
                                 $liste_type_audit=$this->entityManager->getRepository(TypeAudit::class)->findAll();
                                   foreach ($liste_type_audit as $item3) 
                                   {

                                       foreach ($actions_type_audit as $item4) 
                                       {
                                           //    dd($item3->getId());
                                           //  var_dump($item3);
                                               if ($item3->getname() === $item4['type_audit']) 
                                               {     
                                                   //dd($item3->getId());                             
                                                     $id_type_audit=$item3->getId();                                                                                                 
                                               } 
                                               else
                                               {
                                                $id_type_audit=1;
                                               }
                                         
                                       }
                                   }

                            /* liste deroulante Zone_auditee */
                            $actions_zoneaudit=$this->entityManager->getRepository(Actions::class)->findRecherchezoneaudit($id);
                            $liste_zoneaudit=$this->entityManager->getRepository(ZoneAuditee::class)->findAll();
                            foreach ($liste_zoneaudit as $item1) 
                            {
                                foreach ($actions_zoneaudit as $item2) 
                                {
                                      if ($item1->getname() === $item2['zone_auditee']) 
                                      {                                             
                                          $id_zoneauditee=$item1->getid();   
                                        //  dd($id_zoneauditee) ;                                                                                             
                                      } 
                                      else
                                      {
                                        $id_zoneauditee=1;
                                      }
                                                                   
                                }
                            }

                          /* liste deroulante Pilote_action */
                         $actions_piloteaction=$this->entityManager->getRepository(Actions::class)->findRecherchepilote_action($id);


                         $liste_piloteaction=$this->entityManager->getRepository(User::class)->findUsertotale();

                         foreach ($liste_piloteaction as $item5) 
                              {
                                 foreach ($actions_piloteaction as $item6) 
                                       {
                                             $pilote=$item5['name'] .' '.$item5['firstname'];

                                           //  dd($item6['pilote_de_laction']);

                                           //  dd($pilote);
                                             
                                            if ($pilote == $item6['pilote_de_laction']) 
                                              {          
                                                
                                                   // dd($pilote);
                                                   // dd($item6['pilote_de_laction'])  ;                                
                                                
                                                   // dd($id_pilote_de_laction);
                                                   // dd($id_zoneauditee) ;   
                                                 
                                                   $id_pilote_de_laction=$item5['id'];   
                                                   
                                                  // var_dump($id_pilote_de_laction);
                                              } 
                                          
                                                               
                                        }
                               }
                               
                              
                                 

                          /* liste deroulante priorite */
                         $actions_priorite=$this->entityManager->getRepository(Actions::class)->findRechercheprioriter($id);
                         $liste_priorite=$this->entityManager->getRepository(ListePriorite::class)->findAll();
                         foreach ($liste_priorite as $item7) 
                              {
                                // dd($liste_priorite);
                                 foreach ($actions_priorite as $item8) 
                                       {  
                              //   dd($actions_priorite);                                         
                                            if ($item7->getName() === $item8['priorite']) 
                                              {    
                                                   // dd($item7->getid());   
                                                   //   dd($item6['pilote_de_laction'])  ;                                
                                                   $id_priorite=$item7->getid();  
                                                   //  dd($id_zoneauditee) ;                                                                                             
                                              } 
                                              else
                                              {
                                                $id_priorite=1;
                                              }
                                                               
                                        }
                               }   
                               
                               

                         /* liste deroulante processus */
                         $actions_processus=$this->entityManager->getRepository(Actions::class)->findRechercheprocessus($id);                         
                         $liste_processus=$this->entityManager->getRepository(Processus::class)->findAll();
                         foreach ($liste_processus as $item9) 
                              {
                                 // dd($liste_processus);
                                 foreach ($actions_processus as $item10) 
                                       {  
                                 // dd($actions_processus);                                         
                                            if ($item9->getName() === $item10['processus']) 
                                              {    
                                                   // dd($item7->getid());   
                                                   //   dd($item6['pilote_de_laction'])  ;                                
                                                   $id_processus=$item9->getid();  
                                                  //  dd($id_processus) ;                                                                                             
                                              } 
                                              else
                                              {
                                                $id_processus=1;
                                              }
                                                               
                                        }
                               }  


                          
                           /* liste deroulante status */
                           $actions_status=$this->entityManager->getRepository(Actions::class)->findRecherchestatut($id);                         
                           $liste_status=$this->entityManager->getRepository(Status::class)->findAll();
                           foreach ($liste_status as $item10) 
                                {
                                   // dd($liste_processus);
                                   foreach ($actions_status as $item11) 
                                         {  
                                                                           
                                              if ($item10->getName() === $item11['status']) 
                                                {    
                                                     // dd($item7->getid());   
                                                     //   dd($item6['pilote_de_laction'])  ;                                
                                                     $id_status=$item10->getid();  
                                                    //  dd($id_processus) ;     
                                                   // dd($id_status);                                                                                         
                                                } 
                                                else
                                                {
                                                  $id_status=1;
                                                }
                                                                 
                                          }
                                 }  



                           /* liste deroulante type de risques */
                           $actions_risques=$this->entityManager->getRepository(Actions::class)->findRecherchetype_de_risque($id);                         
                           $liste_risques=$this->entityManager->getRepository(TypeDeRisque::class)->findAll();
                           foreach ($liste_risques as $item12) 
                                {
                                    // dd($liste_risques);
                                   foreach ($actions_risques as $item13) 
                                         {  
                                             //  dd($actions_risques);                              
                                              if ($item12->getName() === $item13['type_de_risques']) 
                                                {    
                                                     // dd($item7->getid());   
                                                     //   dd($item6['pilote_de_laction'])  ;                                
                                                    $id_risques=$item12->getid();  
                                                    //  dd($id_processus) ;     
                                                  //   dd($id_risques);     
                                                                                                                                
                                                } 
                                                else
                                                {
                                                   $id_risques=1;
                                                }
                                                                 
                                          }
                                 } 


                            $actions=new Actions();
                          //  $i= $actions->setIdCreateurDeActions(1);


                            $actions_risques=$this->entityManager->getRepository(Actions::class)->find($id);     
                            $idCreateurDeActions=$actions_risques->getIdCreateurDeActions();



                          // dd($idCreateurDeActions);

                         //   $i=$actions->setIdCreation($this->getUser()->getId());
                      //     $i= $actions->setIdCreateurDeActions(1);
                          // $actions->setId(1);
                       //    $actions->Id(1);
                          //  dd($i);
                       

                            $form=$this->createForm(FormModificationActionsType::class, $actions, [
                                'actions_recherches'=>$actions_recherches,
                                'actions_zoneaudit'=>$actions_zoneaudit,
                                'id_zoneauditee'=>$id_zoneauditee,
                                 'id_type_audit'=>$id_type_audit,
                                 'id_pilote_de_laction'=>$id_pilote_de_laction,
                                 'id_priorite'=>$id_priorite,
                                 'id_processus'=>$id_processus,
                                 'id_status'=>$id_status,
                                 'id_risques'=>$id_risques,
                                 'idCreateurDeActions'=>$idCreateurDeActions
                          ]);  

                          $form->handleRequest($request);

                          

if ($form->isSubmitted() && $form->isValid()) 
   {
       
       $entity = $this->entityManager->getRepository(Actions::class)->find($id);

       if (!$entity) {
        throw $this->createNotFoundException('Entity not found');
    }

    // dd($form->get('Type_audit')->getName()); 
   

    $form->get('Type_audit')->getData();
    $form->get('Date_de_laudit')->getData();
    $form->get('Zone_auditee')->getData();
    $form->get('Remarques_commentaires')->getData();
    $form->get('Pilote_de_laction')->getData();
    $form->get('cause_racine')->getData();
    $form->get('action_curatif')->getData();
    $form->get('action_correctif')->getData();
    $form->get('Priorite')->getData();
    $form->get('Processus')->getData();
    $form->get('delais')->getData();
    $form->get('date_de_cloture')->getData();
    $form->get('Status')->getData();
    $form->get('Etat_avancement')->getData();
    $form->get('case_diffusion')->getData();
    $form->get('Liste_diffusion')->getData();
    $form->get('illustration')->getData();
    $form->get('Type_de_risques')->getData();
    $form->get('id_createur_action')->getData();  

    /*image*/
                /* image Je commence par recuperer l'illustration du formulaire le champ add('illustration')  */
                $imageFile=$form->get('illustration')->getData();
            //   dd($imageFile);
                
              $illustration_de_la_base_de_donnee=$entity->getillustration();
              // $illustration_du_formulaire= $form->get('illustration')->getData();;

              $string = $form->get('illustration')->getData();
              $pattern = "/^images\//";
              $replacement = "";
              $result = preg_replace($pattern, $replacement, $string);

              if($illustration_de_la_base_de_donnee ==  $result)
              {
              }
              else
              {
                        // Par exemple, vous pouvez utiliser le service "filesystem" pour déplacer l'image téléchargée vers un répertoire spécifique
                          $newFilename = md5(uniqid()) . '.' . $imageFile->guessExtension();
                          $imageFile->move(
                              $this->getParameter('images_directory'),
                              $newFilename
                          );
              };
    /*image*/

 

// echo $result;
//    dd($result);


  // dd( $entity->getillustration());
     


     





  // $actions->setIllustration($newFilename);
   /* image */
  // dd($newFilename);


 //   dd($form->get('illustration')->getData());
   



  //  $illustration=$form->get('illustration')->getData()->getClientOriginalName();

 //  dd($form->get('illustration')->getData()->getClientOriginalName());


   // dd($form->get('illustration')->getData());


   // dd($form->get('Type_de_risques')->getData());
 
    /*******************************OK */

   //  dd($form->get('Type_audit')->getData());

   // $entity->setId_creation($newData['property1']);


       $entity->setTypeAudit($form->get('Type_audit')->getData());
       $entity->setZoneAuditee($form->get('Zone_auditee')->getData());
       $entity->setDateDeLaudit($form->get('Date_de_laudit')->getData());    
       $entity->setRemarquesCommentaires( $form->get('Remarques_commentaires')->getData());
       $entity->setPiloteDeLaction($form->get('Pilote_de_laction')->getData());
       $entity->setCauseRacine($form->get('cause_racine')->getData());
       $entity->setActionCuratif($form->get('action_curatif')->getData());
       $entity->setActionCorrectif($form->get('action_correctif')->getData());
       $entity->setPriorite($form->get('Priorite')->getData());
       $entity->setProcessus($form->get('Processus')->getData());
       $entity->setDelais($form->get('delais')->getData());
       $entity->setDateDeCloture($form->get('date_de_cloture')->getData());
       $entity->setStatus($form->get('Status')->getData());
       $entity->setEtatAvancement($form->get('Etat_avancement')->getData());
       $entity->setTypeDeRisques($form->get('Type_de_risques')->getData());   
       $entity->setCaseDiffusion($form->get('case_diffusion')->getData());
       $entity->setListeDiffusion($form->get('Liste_diffusion')->getData());
       $entity->setIdCreateurDeActions($form->get('id_createur_action')->getData());
       
       /*image*/
       if($illustration_de_la_base_de_donnee ==  $result)
       {    
       }
       else
       {
        $entity->setIllustration($newFilename);
        }
        /*image*/
       
     

      // dd($entity->getIdCreateurDeActions());;

 //     $entity->setIllustration($illustration);


  //     $entity->setIllustration($form->get('illustration')->getData('originalName'));

 //  dd($entity);
       // $form->get('illustration')->getData());

       $this->entityManager->persist($entity);
       $this->entityManager->flush();
 
  //  $entity->setDateDeCloture($newData['property2']);
  //  $entity->setStatus($newData['property2']);
  //  $entity->setEtatAvancement($newData['property2']);

  //  $entity->setCaseDiffusion($newData['property2']);
  //  $entity->setListeDiffusion($newData['property2']);
  // $entity->setTypeDeRisques('gater ohhh');


  

 //   $this->entityManager->persist($actions);
  //  $this->entityManager->flush();

         /*******************************OK */


 //   dd($actions=$form->get('Liste_diffusion')->getData());

   // dd($actions=$form->get('Date_de_laudit')->getData());

   // dd($actions=$form->get('Priorite')->getData());

   /* imge */

/*

   $imageFile = $form->get('illustration')->getData();
   // Par exemple, vous pouvez utiliser le service "filesystem" pour déplacer l'image téléchargée vers un répertoire spécifique
   $newFilename = md5(uniqid()) . '.' . $imageFile->guessExtension();
   $imageFile->move(
       $this->getParameter('images_directory'),
       $newFilename
   );
   $actions->setIllustration($newFilename);

*/

   /* image */

  // $actions=$form->get('Date_de_laudit')->getData();
  // $actions->modify('+3 day');
  //  dd($actions);

  /* priorite */
 $priorite=$form->get('Priorite')->getData();
 $date_de_laudit=$form->get('Date_de_laudit')->getData();
//  dd($priorite);


            $delais=$form->get('delais')->getData();


            if($priorite=="Priorité 1")
            {
                    $date_de_laudit->modify('+1 day');                
                    $new_date_audit=$date_de_laudit->modify('+1 day');
                    if($delais>=$new_date_audit)
                    {
                        $notification='Votre délais ne peut pas être supérieurs à 1 jours';
                      // dd($new_date_audit);
                      
                    }
                    else
                    {
                        // dd('success');
                        $notification_succes='Votre action à bien été enregistrer';
                      //  $this->entityManager->persist($actions);
                      //  $this->entityManager->flush();
                        $users= $form->get('Liste_diffusion')->getData();
                        $destinataires=[];

                        foreach ($users as $user) {
                        $destinataires[] = $user->getEmail();
                        }

                        $outputArray = [];
                        $keys = array_keys($destinataires);
                        
                        for ($i = 0; $i < count($destinataires); $i++) {
                            $key = $keys[$i];   

                            $outputArray[$i]['email'] = $destinataires[$key];
                        }                   
                    

                      // dd($outputArray);

                    $mail=new Mail();
                    $mail->send($outputArray, 'John Doe', 'Mon premier mail', 'Audit HSE action de prirotié 1');     

              

                        

                    
                    
                    }
            }
            elseif($priorite=="Priorité 2")
            {
                        $date_de_laudit->modify('+62 day');                
                        $new_date_audit=$date_de_laudit->modify('+62 day');
                        if($delais>=$new_date_audit)
                        {
                            $notification='Votre délais ne peut pas être supérieurs à 62 jours';
                            // dd($new_date_audit);
                        }
                        else
                        {
                            // dd('success');
                            $notification_succes='Votre action à bien été enregistrer';
                            $this->entityManager->persist($actions);
                            $this->entityManager->flush();
                        }

            }
            else
            {
                        $date_de_laudit->modify('+93 day');                
                        $new_date_audit=$date_de_laudit->modify('+93 day');
                        if($delais>=$new_date_audit)
                        {
                            $notification='Votre délais ne peut pas être supérieurs à 93 jours';
                            // dd($new_date_audit);
                        }
                        else
                        {
                            // dd('success');
                            $notification_succes='Votre action à bien été enregistrer';
                            $this->entityManager->persist($actions);
                            $this->entityManager->flush();
                        }
            }
   }
   else
   {
       $notification='L\'action n\'a pas pu être enregistrer';
   }

                            return $this->render('recherche_action/modification_fiche_action.html.twig', [
                            'form' => $form->createView(),
                            'actions_recherches'=>$actions_recherches
                                                  ]);

              }

}
