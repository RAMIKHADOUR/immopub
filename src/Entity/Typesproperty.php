<?php

namespace App\Entity;

use App\Repository\TypespropertyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypespropertyRepository::class)]
class Typesproperty
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $types_property = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updatedAt = null;

    /**
     * @var Collection<int, Propertys>
     */
    #[ORM\OneToMany(targetEntity: Propertys::class, mappedBy: 'typesproperty')]
    private Collection $propertys;

    public function __construct()
    {
        $this->propertys = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypesProperty(): ?string
    {
        return $this->types_property;
    }

    public function setTypesProperty(string $types_property): static
    {
        $this->types_property = $types_property;

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
    public function getPropertys(): Collection
    {
        return $this->propertys;
    }

    public function addProperty(Propertys $property): static
    {
        if (!$this->propertys->contains($property)) {
            $this->propertys->add($property);
            $property->setTypesproperty($this);
        }

        return $this;
    }

    public function removeProperty(Propertys $property): static
    {
        if ($this->propertys->removeElement($property)) {
            // set the owning side to null (unless already changed)
            if ($property->getTypesproperty() === $this) {
                $property->setTypesproperty(null);
            }
        }

        return $this;
    }
    public function __toString(): string
    {
      
        return $this->types_property;
      
    }
}
