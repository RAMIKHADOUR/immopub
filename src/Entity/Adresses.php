<?php

namespace App\Entity;

use App\Repository\AdressesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdressesRepository::class)]
class Adresses
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $numero_voie = null;

    #[ORM\Column(length: 50)]
    private ?string $type_voie = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_voie = null;

    #[ORM\Column(length: 255)]
    private ?string $ville = null;

    #[ORM\Column(length: 255)]
    private ?string $code_postale = null;

    #[ORM\Column(length: 255)]
    private ?string $region = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Propertys $propertya = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroVoie(): ?int
    {
        return $this->numero_voie;
    }

    public function setNumeroVoie(int $numero_voie): static
    {
        $this->numero_voie = $numero_voie;

        return $this;
    }

    public function getTypeVoie(): ?string
    {
        return $this->type_voie;
    }

    public function setTypeVoie(string $type_voie): static
    {
        $this->type_voie = $type_voie;

        return $this;
    }

    public function getNomVoie(): ?string
    {
        return $this->nom_voie;
    }

    public function setNomVoie(string $nom_voie): static
    {
        $this->nom_voie = $nom_voie;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): static
    {
        $this->ville = $ville;

        return $this;
    }

    public function getCodePostale(): ?string
    {
        return $this->code_postale;
    }

    public function setCodePostale(string $code_postale): static
    {
        $this->code_postale = $code_postale;

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

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getPropertya(): ?Propertys
    {
        return $this->propertya;
    }

    public function setPropertya(?Propertys $propertya): static
    {
        $this->propertya = $propertya;

        return $this;
    }
}
