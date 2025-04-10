<?php

namespace App\Entity;

use App\Enum\Visibilitee;
use App\Repository\EtablissementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: EtablissementRepository::class)]
class Etablissement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "L'appellation officielle ne peut pas être vide.")]
    private ?string $appellationOfficiel = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "La denomination principale ne peut pas être vide.")]
    private ?string $denominationPrincipale = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: "La longitude est requise.")]
    #[Assert\Range(
        min: -180,
        max: 180,
        notInRangeMessage: "La longitude doit être comprise entre -180 et 180."
    )]
    private ?float $longitude = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $adresse = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "Le departement ne peut pas être vide.")]
    private ?string $departement = null;

    #[ORM\Column(length: 150)]
    #[Assert\NotBlank(message: "La commune ne peut pas être vide.")]
    private ?string $commune = null;

    #[ORM\Column(length: 200)]
    #[Assert\NotBlank(message: "La region ne peut pas être vide.")]
    private ?string $region = null;

    #[ORM\Column(length: 200)]
    private ?string $academie = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateOuverture = null;

    #[ORM\Column(type: Types::SIMPLE_ARRAY, enumType: Visibilitee::class)]
    #[Assert\NotBlank(message: "Le secteur est obligatoire.")]
    private array $secteur = [];

    #[ORM\Column]
    private ?int $code_departement = null;

    #[ORM\Column]
    private ?int $code_region = null;

    #[ORM\Column]
    private ?int $code_academie = null;

    #[ORM\Column]
    private ?int $code_commune = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: "La latitude est requise.")]
    #[Assert\Range(
        min: -90,
        max: 90,
        notInRangeMessage: "La latitude doit être comprise entre -90 et 90."
    )]
    private ?float $latitude = null;

    /**
     * @var Collection<int, Commentaire>
     */
    #[ORM\OneToMany(targetEntity: Commentaire::class, mappedBy: 'etablissement')]
    private Collection $commentaires;

    public function __construct()
    {
        $this->commentaires = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAppellationOfficiel(): ?string
    {
        return $this->appellationOfficiel;
    }

    public function setAppellationOfficiel(string $appellationOfficiel): static
    {
        $this->appellationOfficiel = $appellationOfficiel;

        return $this;
    }

    public function getDenominationPrincipale(): ?string
    {
        return $this->denominationPrincipale;
    }

    public function setDenominationPrincipale(string $denominationPrincipale): static
    {
        $this->denominationPrincipale = $denominationPrincipale;

        return $this;
    }

    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    public function setLongitude(float $longitude): static
    {
        $this->longitude = $longitude;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getDepartement(): ?string
    {
        return $this->departement;
    }

    public function setDepartement(string $departement): static
    {
        $this->departement = $departement;

        return $this;
    }

    public function getCommune(): ?string
    {
        return $this->commune;
    }

    public function setCommune(string $commune): static
    {
        $this->commune = $commune;

        return $this;
    }

    public function getRegion(): ?string
    {
        return $this->region;
    }

    public function setRegion(string $region): static
    {
        $this->region = $region;

        return $this;
    }

    public function getAcademie(): ?string
    {
        return $this->academie;
    }

    public function setAcademie(string $academie): static
    {
        $this->academie = $academie;

        return $this;
    }

    public function getDateOuverture(): ?\DateTimeInterface
    {
        return $this->dateOuverture;
    }

    public function setDateOuverture(\DateTimeInterface $dateOuverture): static
    {
        $this->dateOuverture = $dateOuverture;

        return $this;
    }

    /**
     * @return Visibilitee[]
     */
    public function getSecteur(): array
    {
        return $this->secteur;
    }

    public function setSecteur(array $secteur): static
    {
        $this->secteur = $secteur;

        return $this;
    }

    public function getCodeDepartement(): ?int
    {
        return $this->code_departement;
    }

    public function setCodeDepartement(int $code_departement): static
    {
        $this->code_departement = $code_departement;

        return $this;
    }

    public function getCodeRegion(): ?int
    {
        return $this->code_region;
    }

    public function setCodeRegion(int $code_region): static
    {
        $this->code_region = $code_region;

        return $this;
    }

    public function getCodeAcademie(): ?int
    {
        return $this->code_academie;
    }

    public function setCodeAcademie(int $code_academie): static
    {
        $this->code_academie = $code_academie;

        return $this;
    }

    public function getCodeCommune(): ?int
    {
        return $this->code_commune;
    }

    public function setCodeCommune(int $code_commune): static
    {
        $this->code_commune = $code_commune;

        return $this;
    }

    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    public function setLatitude(float $latitude): static
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * @return Collection<int, Commentaire>
     */
    public function getCommentaires(): Collection
    {
        return $this->commentaires;
    }

    public function addCommentaire(Commentaire $commentaire): static
    {
        if (!$this->commentaires->contains($commentaire)) {
            $this->commentaires->add($commentaire);
            $commentaire->setEtablissement($this);
        }

        return $this;
    }

    public function removeCommentaire(Commentaire $commentaire): static
    {
        if ($this->commentaires->removeElement($commentaire)) {
            // set the owning side to null (unless already changed)
            if ($commentaire->getEtablissement() === $this) {
                $commentaire->setEtablissement(null);
            }
        }

        return $this;
    }
}
