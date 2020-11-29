<?php

namespace App\Controller\Admin;

use App\Entity\Company;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    /**
     */
    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('ProyectoAT');
    }

    /**
     */
    public function configureMenuItems(): iterable
    {
        if ($this->isGranted('ROLE_ADMIN')) {
            yield MenuItem::section('Administrador');
            yield MenuItem::linkToCrud('Users', 'fas fa-list', User::class);
            yield MenuItem::linkToCrud('Company', 'fas fa-list', Company::class);
        }

        if ($this->isGranted('ROLE_APPLICANT')) {
            yield MenuItem::section('Aplicante');
        }

        if ($this->isGranted('ROLE_COMPANY')) {
            yield MenuItem::section('Campañia');
        }
    }
}
