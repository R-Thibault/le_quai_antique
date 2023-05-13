<?php

namespace App\Controller\Admin;

use App\Entity\Planning;
use App\Entity\Users;
use App\Entity\CombosMeals;
use App\Entity\Meals;
use App\Entity\BigCategories;
use App\Entity\Categories;
use App\Entity\Images;
use App\Entity\Dishes;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    #[IsGranted('ROLE_ADMIN')]
    public function index(): Response
    {
        
        return parent::index();


        $routeBuilder = $this->container->get(AdminUrlGenerator::class);
        $url = $routeBuilder->setController(PlanningCrudController::class)->generateUrl();

        return $this->redirect($url);
        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('EasyAdmin/page/content.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Le Quai Antique');
            
    }

    public function configureCrud(): Crud
    {
        return parent::configureCrud()
            ->renderContentMaximized()
            ->showEntityActionsInlined()
            ->setDefaultSort([
                'id' => 'DESC',
            ])
        ;
    }

    public function configureMenuItems(): iterable
    {
        // yield MenuItem::linkToDashboard('Panneau d\'administration', 'fa fa-home');
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
        yield MenuItem::linktoRoute('Retour au site', 'fas fa-home', 'app_home');
        yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-list', Users::class);
        yield MenuItem::linkToCrud('Planning', 'fas fa-list', Planning::class);
        yield MenuItem::linkToCrud('Menues', 'fas fa-list', CombosMeals::class);
        yield MenuItem::linkToCrud('Formules', 'fas fa-list', Meals::class);
        yield MenuItem::linkToCrud('Catégories', 'fas fa-list', BigCategories::class);
        yield MenuItem::linkToCrud('Sous-catégories', 'fas fa-list', Categories::class);
        yield MenuItem::linkToCrud('Images', 'fas fa-list', Images::class);
        yield MenuItem::linkToCrud('Plats', 'fas fa-list', Dishes::class);

    }
}
