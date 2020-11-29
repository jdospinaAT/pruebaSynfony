<?php

namespace App\Entity;

use App\Repository\ApplicantOfferRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ApplicantOfferRepository::class)
 */
class ApplicantOffer
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Applicant::class, inversedBy="offer_id")
     * @ORM\JoinColumn(nullable=false)
     */
    private $applicant;

    /**
     * @ORM\ManyToOne(targetEntity=Offer::class, inversedBy="applicantOffers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $offer;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getApplicantId(): ?Applicant
    {
        return $this->applicant;
    }

    public function setApplicantId(?Applicant $applicant_id): self
    {
        $this->applicant = $applicant_id;

        return $this;
    }

    public function getOfferId(): ?Offer
    {
        return $this->offer;
    }

    public function setOfferId(?Offer $offer_id): self
    {
        $this->offer = $offer_id;

        return $this;
    }
}
