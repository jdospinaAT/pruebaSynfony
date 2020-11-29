<?php

namespace App\Entity;

use App\Repository\OfferRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OfferRepository::class)
 */
class Offer
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity=Company::class, inversedBy="offers")
     */
    private $owner;

    /**
     * @ORM\ManyToMany(targetEntity=Applicant::class, mappedBy="owner")
     */
    private $applicants;

    /**
     * @ORM\ManyToMany(targetEntity=Applicant::class, mappedBy="owner")
     */
    private $applications;

    /**
     * @ORM\OneToMany(targetEntity=ApplicantOffer::class, mappedBy="offer_id")
     */
    private $applicantOffers;

    public function __construct()
    {
        $this->applicants = new ArrayCollection();
        $this->applications = new ArrayCollection();
        $this->applicantOffers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getOwner(): ?Company
    {
        return $this->owner;
    }

    public function setOwner(?Company $owner): self
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * @return Collection|Applicant[]
     */
    public function getApplicants(): Collection
    {
        return $this->applicants;
    }

    public function addApplicant(Applicant $applicant): self
    {
        if (!$this->applicants->contains($applicant)) {
            $this->applicants[] = $applicant;
            $applicant->addOwner($this);
        }

        return $this;
    }

    public function removeApplicant(Applicant $applicant): self
    {
        if ($this->applicants->removeElement($applicant)) {
            $applicant->removeOwner($this);
        }

        return $this;
    }

    /**
     * @return Collection|Applicant[]
     */
    public function getApplications(): Collection
    {
        return $this->applications;
    }

    public function addApplication(Applicant $application): self
    {
        if (!$this->applications->contains($application)) {
            $this->applications[] = $application;
            $application->addOwner($this);
        }

        return $this;
    }

    public function removeApplication(Applicant $application): self
    {
        if ($this->applications->removeElement($application)) {
            $application->removeOwner($this);
        }

        return $this;
    }

    public function __toString()
    {
        return (string) $this->name;
    }

    /**
     * @return Collection|ApplicantOffer[]
     */
    public function getApplicantOffers(): Collection
    {
        return $this->applicantOffers;
    }

    public function addApplicantOffer(ApplicantOffer $applicantOffer): self
    {
        if (!$this->applicantOffers->contains($applicantOffer)) {
            $this->applicantOffers[] = $applicantOffer;
            $applicantOffer->setOfferId($this);
        }

        return $this;
    }

    public function removeApplicantOffer(ApplicantOffer $applicantOffer): self
    {
        if ($this->applicantOffers->removeElement($applicantOffer)) {
            // set the owning side to null (unless already changed)
            if ($applicantOffer->getOfferId() === $this) {
                $applicantOffer->setOfferId(null);
            }
        }

        return $this;
    }
}
