<?php

namespace App\Entity;

use App\Repository\TypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeRepository::class)]
class Type
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 30)]
    private $forme;

    #[ORM\OneToMany(mappedBy: 'type', targetEntity: Produit::class)]
    private $avoir;

    public function __construct()
    {
        $this->avoir = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->forme;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getForme(): ?string
    {
        return $this->forme;
    }

    public function setForme(string $forme): self
    {
        $this->forme = $forme;
        return $this;
    }

    /**
     * @return Collection<int, Produit>
     */
    public function getAvoir(): Collection
    {
        return $this->avoir;
    }

    public function addAvoir(Produit $avoir): self
    {
        if (!$this->avoir->contains($avoir)) {
            $this->avoir[] = $avoir;
            $avoir->setType($this);
        }
        return $this;
    }

    public function removeAvoir(Produit $avoir): self
    {
        if ($this->avoir->removeElement($avoir)) {
            // set the owning side to null (unless already changed)
            if ($avoir->getType() === $this) {
                $avoir->setType(null);
            }
        }
        return $this;
    }
}
