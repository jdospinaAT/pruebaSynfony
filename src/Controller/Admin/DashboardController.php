<?php

namespace App\Controller\Admin;

use App\Entity\Company;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        if ($this->isGranted('ROLE_ADMIN') || $this->isGranted('ROLE_COMPANY')){
            return parent::index();
        }

        return $this->redirect('/login');
    }

    /**
     */

    public function configureDashboard(): Dashboard
    {

        return Dashboard::new()
            // the name visible to end users
            ->setTitle('Administrador');
    }

    /**
     */
    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Home', 'fa fa-home');

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

        MenuItem::linkToLogout('Logout', 'fa fa-exit');
    }
}
