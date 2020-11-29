<?php

namespace App\Controller;

use App\Entity\Company;
use App\Entity\Offer;
use App\Form\CompanyType;
use App\Form\OfferType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CompanyController extends AbstractController
{
    /**
     * @Route("/profile/company", name="company")
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function index(EntityManagerInterface $entityManager)
    {
        $companies = $entityManager
            ->getRepository(Company::class)
            ->findAll();

        return $this->render('company/index.html.twig', [
            'companies' => $companies,
        ]);
    }

    /**
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @return RedirectResponse|Response
     * @Route("/company/new", name="company_new")
     */
    public function create(Request $request, EntityManagerInterface $entityManager)
    {
        $company = new Company();
        $form = $this->createForm(CompanyType::class);
        $form->setData($company);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $company = $form->getData();

            $entityManager->persist($company);
            $entityManager->flush();

            return $this->redirectToRoute('company');
        }

        return $this->render('company/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/profile/company/{id}/offers", name="company_offers")
     * @param Company $company
     * @return Response
     */
    public function showOffers(Company $company)
    {
        return $this->render('company/show_offers.html.twig', [
            'company' => $company,
        ]);
    }



    /**
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @return RedirectResponse|Response
     * @Route("/profile/company/{id}/offers/new", name="offer_new", requirements={"id":"\d+"} )
     */
    public function newOffer(Request $request, EntityManagerInterface $entityManager)
    {
        $offer = new Offer();
        $form = $this->createForm(OfferType::class);
        $form->setData($offer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $company = $form->getData();

            $entityManager->persist($company);
            $entityManager->flush();

            return $this->redirectToRoute('/');
        }

        return $this->render('offer/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
