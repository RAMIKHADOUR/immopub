<?php

namespace App\Entity;

use DateTimeImmutable;
use App\Entity\Annonces;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\PropertysRepository;

#[ORM\Entity(repositoryClass: PropertysRepository::class)]
class Propertys
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $etat = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column]
    private ?float $surface = null;

    #[ORM\Column]
    private ?float $prix = null;

    #[ORM\Column]
    private ?int $chambres = null;

    #[ORM\Column]
    private ?int $salle_bains = null;

    #[ORM\Column]
    private ?int $etages = null;

    #[ORM\Column]
    private ?int $nomre_etages = null;

    #[ORM\Column]
    private ?bool $internet = null;

    #[ORM\Column]
    private ?bool $garage = null;

    #[ORM\Column]
    private ?bool $piscine = null;

    #[ORM\Column]
    private ?bool $camera = null;

    #[ORM\Column]
    private ?DateTimeImmutable $updatedAt = null;

    public function __construct()
    {
        $this->updatedAt = new DateTimeImmutable();
    }

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Annonces $annonce = null;

    #[ORM\ManyToOne(inversedBy: 'property')]
    private ?Categorys $categorys = null;

    #[ORM\ManyToOne(inversedBy: 'propertys')]
    private ?Typesproperty $typesproperty = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): static
    {
        $this->etat = $etat;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getSurface(): ?float
    {
        return $this->surface;
    }

    public function setSurface(float $surface): static
    {
        $this->surface = $surface;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): static
    {
        $this->prix = $prix;

        return $this;
    }

    public function getChambres(): ?int
    {
        return $this->chambres;
    }

    public function setChambres(int $chambres): static
    {
        $this->chambres = $chambres;

        return $this;
    }

    public function getSalleBains(): ?int
    {
        return $this->salle_bains;
    }

    public function setSalleBains(int $salle_bains): static
    {
        $this->salle_bains = $salle_bains;

        return $this;
    }

    public function getEtages(): ?int
    {
        return $this->etages;
    }

    public function setEtages(int $etages): static
    {
        $this->etages = $etages;

        return $this;
    }

    public function getNomreEtages(): ?int
    {
        return $this->nomre_etages;
    }

    public function setNomreEtages(int $nomre_etages): static
    {
        $this->nomre_etages = $nomre_etages;

        return $this;
    }

    public function isInternet(): ?bool
    {
        return $this->internet;
    }

    public function setInternet(bool $internet): static
    {
        $this->internet = $internet;

        return $this;
    }

    public function isGarage(): ?bool
    {
        return $this->garage;
    }

    public function setGarage(bool $garage): static
    {
        $this->garage = $garage;

        return $this;
    }

    public function isPiscine(): ?bool
    {
        return $this->piscine;
    }

    public function setPiscine(bool $piscine): static
    {
        $this->piscine = $piscine;

        return $this;
    }

    public function isCamera(): ?bool
    {
        return $this->camera;
    }

    public function setCamera(bool $camera): static
    {
        $this->camera = $camera;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getAnnonce(): ?Annonces
    {
        return $this->annonce;
    }

    public function setAnnonce(?Annonces $annonce): static
    {
        $this->annonce = $annonce;

        return $this;
    }

    public function getCategorys(): ?Categorys
    {
        return $this->categorys;
    }

    public function setCategorys(?Categorys $categorys): static
    {
        $this->categorys = $categorys;

        return $this;
    }

    public function getTypesproperty(): ?Typesproperty
    {
        return $this->typesproperty;
    }

    public function setTypesproperty(?Typesproperty $typesproperty): static
    {
        $this->typesproperty = $typesproperty;

        return $this;
    }
}
