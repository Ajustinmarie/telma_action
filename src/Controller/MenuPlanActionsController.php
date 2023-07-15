<?php

namespace App\Controller;

use App\Entity\Actions;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MenuPlanActionsController extends AbstractController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    #[Route('/menu/plan/actions', name: 'menu_plan_actions')]
    public function index(): Response
    {


    

 
/*
SELECT COUNT(*) AS total_count, MONTH(date_de_laudit) FROM actions WHERE date_de_laudit>='2024-01-01' and date_de_laudit<='2024-12-31'; 

SELECT COUNT(*) AS total_count, MONTH(date_de_laudit) as mois FROM actions WHERE date_de_laudit>='2018-01-01' and date_de_laudit<='2018-12-31'; 

SELECT *, MONTH(date_de_laudit)  FROM actions WHERE date_de_laudit BETWEEN '2018-01-01' and '2018-12-31' ; 

SELECT *, MONTH(date_de_laudit)  FROM actions WHERE date_de_laudit BETWEEN '2018-01-01' and '2018-12-31' GROUP BY 3; 

SELECT MONTH(date_de_laudit) AS mois_audit, COUNT(*) AS total_audit
FROM actions
WHERE date_de_laudit BETWEEN '2018-01-01' AND '2018-12-31'
GROUP BY mois_audit;

2025-06-01
*/



        return $this->render('page_accueil_connexion/menu_plan_actions.php', [
            'controller_name' => 'MenuPlanActionsController',
           
        ]);
    }
}
