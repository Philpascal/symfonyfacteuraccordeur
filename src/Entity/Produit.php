<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProduitRepository::class)]
class Produit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 50)]
    private $ref;

    #[ORM\Column(type: 'string', length: 50)]
    private $marque;

    #[ORM\Column(type: 'string', length: 150)]
    private $photo;

    #[ORM\ManyToOne(targetEntity: Couleur::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $posseder;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $enregistrer;

    #[ORM\ManyToMany(targetEntity: Magasin::class)]
    private $etre_disponible;

    public function __construct()
    {
        $this->etre_disponible = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRef(): ?string
    {
        return $this->ref;
    }

    public function setRef(string $ref): self
    {
        $this->ref = $ref;

        return $this;
    }

    public function getMarque(): ?string
    {
        return $this->marque;
    }

    public function setMarque(string $marque): self
    {
        $this->marque = $marque;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getPosseder(): ?Couleur
    {
        return $this->posseder;
    }

    public function setPosseder(?Couleur $posseder): self
    {
        $this->posseder = $posseder;

        return $this;
    }

    public function getEnregistrer(): ?User
    {
        return $this->enregistrer;
    }

    public function setEnregistrer(?User $enregistrer): self
    {
        $this->enregistrer = $enregistrer;

        return $this;
    }

    /**
     * @return Collection<int, Magasin>
     */
    public function getEtreDisponible(): Collection
    {
        return $this->etre_disponible;
    }

    public function addEtreDisponible(Magasin $etreDisponible): self
    {
        if (!$this->etre_disponible->contains($etreDisponible)) {
            $this->etre_disponible[] = $etreDisponible;
        }

        return $this;
    }

    public function removeEtreDisponible(Magasin $etreDisponible): self
    {
        $this->etre_disponible->removeElement($etreDisponible);

        return $this;
    }
}
