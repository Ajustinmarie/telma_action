<?php

namespace App\Controller;

use App\Entity\Actions;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PageAccueilConnexionController extends AbstractController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }



   




    #[Route('/page/accueil/connexion', name: 'page_accueil_connexion')]
    public function index(): Response
    {
       $name=$this->getuser()->getName();
       $firstname=$this->getuser()->getFirstname();
       $name_firstame= $name.' '.$firstname;
        
   
     /*nombre d'action en cours */
     $nb_action_en_cours=$this->entityManager->getRepository(Actions::class)->findNb_action_en_cours($name_firstame);   
     $nb_en_cours=$nb_action_en_cours[0]["COUNT(status)"];
      /*nombre d'action en cours */


           /*nombre d'action cloturée */
     $nb_action_en_cloturee=$this->entityManager->getRepository(Actions::class)->findNb_action_cloturee($name_firstame);   
     $nb_en_cloturee=$nb_action_en_cloturee[0]["COUNT(status)"];
      /*nombre d'action en cours */

  // dd($nb_en_cloturee);



        return $this->render('page_accueil_connexion/index.html.twig', [
            'controller_name' => 'PageAccueilConnexionController',
            'nb_en_cours'=>$nb_en_cours,
            'nb_en_cloturee'=>$nb_en_cloturee
        ]);
    }
}
