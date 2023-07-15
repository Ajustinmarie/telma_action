<?php

namespace App\Controller\Admin;

use App\Entity\Actions;
use App\Entity\ListeFonction;
use App\Entity\ListePriorite;
use App\Entity\Processus;
use App\Entity\Status;
use App\Entity\TypeAudit;
use App\Entity\TypeDeRisque;
use App\Entity\ZoneAuditee;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        //return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
         $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
         return $this->redirect($adminUrlGenerator->setController(UserCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Telma Plan Actions');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Utilisateur', 'fa fa-home');
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', User::class);
        yield MenuItem::linkToCrud('Liste des zones auditées', 'fas fa-list', ZoneAuditee::class);
        yield MenuItem::linkToCrud('Type de Risque', 'fas fa-list', TypeDeRisque::class);
        yield MenuItem::linkToCrud('Type d\'audit', 'fas fa-list', TypeAudit::class);
        yield MenuItem::linkToCrud('Status', 'fas fa-list', Status::class);
        yield MenuItem::linkToCrud('Processus', 'fas fa-list', Processus::class);
        yield MenuItem::linkToCrud('Liste des priorité', 'fas fa-list', ListePriorite::class);
        yield MenuItem::linkToCrud('Liste des fonctions', 'fas fa-list', ListeFonction::class);
        yield MenuItem::linkToCrud('Actions', 'fas fa-list', Actions::class);

    }
}
