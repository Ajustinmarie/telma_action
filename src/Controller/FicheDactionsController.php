<?php

namespace App\Controller;

use App\classe\Mail;
use App\Entity\Actions;
use App\Form\FormulaireActionsType;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;


class FicheDactionsController extends AbstractController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/fiche/dactions', name: 'fiche_dactions')]
    public function index(Request $request): Response
    {

        $notification=null;
        $notification_succes=null;

        $actions= new Actions();
        $form=$this->createForm(FormulaireActionsType::class, $actions);
        $form->handleRequest($request);

       // dd($this->getUser()->getId());

      //  dd($this->getUser()->getId());
         if(empty($this->getUser()))
         {
            return $this->redirectToRoute('app_logout');
         };


          $actions->setIdCreateurDeActions($this->getUser()->getId());
           
      //  $actions->setIdCreation($this->getUser());
      // $password=$form->get('password')->getData();
      // $this->getUser()->getAddresses()->getValues();


       



if ($form->isSubmitted() && $form->isValid()) {
 
   // $this->entityManager->persist($actions);
   // $this->entityManager->flush();

 //   dd($actions=$form->get('Liste_diffusion')->getData());

   // dd($actions=$form->get('Date_de_laudit')->getData());

   // dd($actions=$form->get('Priorite')->getData());

   /* imge */
   $imageFile = $form->get('illustration')->getData();
   // Par exemple, vous pouvez utiliser le service "filesystem" pour déplacer l'image téléchargée vers un répertoire spécifique
   $newFilename = md5(uniqid()) . '.' . $imageFile->guessExtension();
   $imageFile->move(
       $this->getParameter('images_directory'),
       $newFilename
   );
   $actions->setIllustration($newFilename);
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
                    $this->entityManager->persist($actions);
                    $this->entityManager->flush();

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
        $notification='';
    }

       
    $nb_action=$this->entityManager->getRepository(Actions::class)->findAll();
    $nb_action = count($nb_action);
    $nb_prochaine_action = $nb_action+1;


        return $this->render('page_accueil_connexion/fiche_actions.php', [
            'form' => $form->createView(),
            'notification' => $notification,
            'notification_succes'=>$notification_succes,
            'nb_prochaine_action'=>$nb_prochaine_action
        ]);
    }
}
