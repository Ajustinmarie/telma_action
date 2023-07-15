<?php

namespace App\Controller;

use App\Form\FormPassUserType;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ModificationMotDePasseController extends AbstractController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    #[Route('/modification/mot/de/passe', name: 'modification_mot_de_passe')]
    public function index(Request $request, UserPasswordEncoderInterface $encoder): Response
    {

        $notification=null;
      

        $user=$this->getUser();
        $form=$this->createForm(FormPassUserType::class, $user);
  
         $form->handleRequest($request);
      
        if ($form->isSubmitted() && $form->isValid()) { 
  
  
         $old_password=$form->get('old_password')->getData();
  
           if($encoder->isPasswordValid($user, $old_password))
           {
  
            $new_password=$form->get('new_password')->getData();
  
            $new_crypt_password=$encoder->encodePassword($user, $new_password);
            
          //  $user=$this->getUser();
            $user->setPassword($new_crypt_password);
  
         
                $this->entityManager->persist($user);
                $this->entityManager->flush();
                $notification='Votre mot de passe a bien été mise a jour';
  
         //      $this->entityManager->persist($user);
         //      $this->entityManager->flush();
           }
           else
           {
            $notification='Votre mot de passe actuel n\'est pas le bon';
           }
  
       }

       return $this->render('page_accueil_connexion/modification_mot_de_passe.php', [
        'form' => $form->createView(),
        'notification' => $notification,
        ]);
    }
}
