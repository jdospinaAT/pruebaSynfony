<?php

namespace App\Controller;

use App\Entity\Applicant;
use App\Entity\Offer;
use App\Form\OfferType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OfferController extends AbstractController
{
    /**
     * @Route("/", name="offers")
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function index(EntityManagerInterface $entityManager)
    {
        $offers = $entityManager->getRepository(Offer::class)->findAll();

        return $this->render('offer/index.html.twig',
            [
                'offers' => $offers,
            ]);
    }

    /**
     * @Route("/profile/offer/{id}", name="offer_show")
     * @param Offer $offer
     * @return Response
     */
    public function show(Offer $offer)
    {
        return $this->render('offer/show.html.twig',
            [
                'offer' => $offer,
            ]);
    }

    /**
     * @Route("/profile/offer/{id}/apply", name="offer_apply")
     * @param Offer $offer
     * @param EntityManagerInterface $entityManager
     * @return RedirectResponse
     */
    public function apply(Offer $offer, EntityManagerInterface $entityManager)
    {
        $user = $this->getUser();
        $applicant = $entityManager->getRepository(Applicant::class)->findOneBy(['user' => $user]);

        if ($applicant){
            $offer->addApplicant($applicant);
            $entityManager->persist($offer);
            try {
                $entityManager->flush();
                $this->addFlash('success', 'Solicitud recibida!');
            } catch (\Exception $exception) {
                $this->addFlash('danger', 'La solicitud no pudo almacenarse. Por favor intente nuevamente.');
            }
            return $this->redirectToRoute('offers');
        }

        return $this->redirectToRoute('offers');
    }
}
