<?php

namespace App\Entity;

use App\Repository\CouleurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CouleurRepository::class)]
class Couleur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 50)]
    private $codecouleur;

    #[ORM\OneToMany(mappedBy: 'couleur', targetEntity: Produit::class)]
    private $produits;

    public function __construct()
    {
        $this->produits = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->codecouleur;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodecouleur(): ?string
    {
        return $this->codecouleur;
    }

    public function setCodecouleur(string $codecouleur): self
    {
        $this->codecouleur = $codecouleur;

        return $this;
    }

    /**
     * @return Collection<int, Produit>
     */
    public function getProduits(): Collection
    {
        return $this->produits;
    }

    public function addProduit(Produit $produit): self
    {
        if (!$this->produits->contains($produit)) {
            $this->produits[] = $produit;
            $produit->setCouleur($this);
        }

        return $this;
    }

    public function removeProduit(Produit $produit): self
    {
        if ($this->produits->removeElement($produit)) {
            // set the owning side to null (unless already changed)
            if ($produit->getCouleur() === $this) {
                $produit->setCouleur(null);
            }
        }

        return $this;
    }
}
