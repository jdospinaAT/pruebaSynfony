<?php

namespace App\Entity;

use App\Repository\ApplicantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ApplicantRepository::class)
 */
class Applicant
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
     * @ORM\ManyToMany(targetEntity=Offer::class, inversedBy="applications")
     */
    private $owner;

    /**
     * @ORM\OneToMany(targetEntity=ApplicantOffer::class, mappedBy="applicant_id")
     */
    private $offer_id;

    /**
     * Applicant constructor.
     */
    public function __construct()
    {
        $this->owner = new ArrayCollection();
        $this->offer_id = new ArrayCollection();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|Offer[]
     */
    public function getOwner(): Collection
    {
        return $this->owner;
    }

    /**
     * @param Offer $owner
     * @return $this
     */
    public function addOwner(Offer $owner): self
    {
        if (!$this->owner->contains($owner)) {
            $this->owner[] = $owner;
        }

        return $this;
    }

    /**
     * @param Offer $owner
     * @return $this
     */
    public function removeOwner(Offer $owner): self
    {
        $this->owner->removeElement($owner);

        return $this;
    }

    /**
     * @return Collection|ApplicantOffer[]
     */
    public function getOfferId(): Collection
    {
        return $this->offer_id;
    }

    /**
     * @param ApplicantOffer $offerId
     * @return $this
     */
    public function addOfferId(ApplicantOffer $offerId): self
    {
        if (!$this->offer_id->contains($offerId)) {
            $this->offer_id[] = $offerId;
            $offerId->setApplicantId($this);
        }

        return $this;
    }

    /**
     * @param ApplicantOffer $offerId
     * @return $this
     */
    public function removeOfferId(ApplicantOffer $offerId): self
    {
        if ($this->offer_id->removeElement($offerId)) {
            // set the owning side to null (unless already changed)
            if ($offerId->getApplicantId() === $this) {
                $offerId->setApplicantId(null);
            }
        }

        return $this;
    }
}
