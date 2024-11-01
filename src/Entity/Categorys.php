<?php

namespace App\Entity;

use App\Repository\CategorysRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategorysRepository::class)]
class Categorys
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $categorie = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updatedAt = null;

    /**
     * @var Collection<int, Propertys>
     */
    #[ORM\OneToMany(targetEntity: Propertys::class, mappedBy: 'categorys')]
    private Collection $property;

    public function __construct()
    {
        $this->property = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    public function setCategorie(string $categorie): static
    {
        $this->categorie = $categorie;

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

    /**
     * @return Collection<int, Propertys>
     */
    public function getProperty(): Collection
    {
        return $this->property;
    }

    public function addProperty(Propertys $property): static
    {
        if (!$this->property->contains($property)) {
            $this->property->add($property);
            $property->setCategorys($this);
        }

        return $this;
    }

    public function removeProperty(Propertys $property): static
    {
        if ($this->property->removeElement($property)) {
            // set the owning side to null (unless already changed)
            if ($property->getCategorys() === $this) {
                $property->setCategorys(null);
            }
        }

        return $this;
    }
    public function __toString(): string
    {
      return $this->categorie;
        
    }
}
