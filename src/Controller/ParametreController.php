<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ParametreController extends AbstractController
{
    #[Route('/parametre', name: 'parametre')]
    public function index(): Response
    {
        return $this->render('page_accueil_connexion/parametre.php', [
            'controller_name' => 'ParametreController',
        ]);
    }
}
