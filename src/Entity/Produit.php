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

    #[ORM\Column(type: 'string', length: 500)]
    private $photo;

    #[ORM\Column(type: 'string', length: 50)]
    private $ref;

    #[ORM\Column(type: 'string', length: 10)]
    private $prix;

    #[ORM\ManyToOne(targetEntity: Marque::class, inversedBy: 'produits')]
    #[ORM\JoinColumn(nullable: false)]
    private $marque;

    #[ORM\ManyToOne(targetEntity: Couleur::class, inversedBy: 'produits')]
    #[ORM\JoinColumn(nullable: false)]
    private $couleur;

    #[ORM\ManyToOne(targetEntity: Type::class, inversedBy: 'produits')]
    #[ORM\JoinColumn(nullable: false)]
    private $type;
/*************pour la collection magasin, 2 id dans l'entity, pour aller chercher l'attribut, mettre des s*/
/******************le produit pointe vers le magasin************************************* */
    #[ORM\ManyToMany(targetEntity: Magasin::class, inversedBy: 'produits')]
    private $magasins;

    public function __construct()
    {
        $this->magasins = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getRef(): ?string
    {
        return $this->ref;
    }

    public function setRef(string $ref): self
    {
        $this->ref = $ref;

        return $this;
    }

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(string $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getMarque(): ?Marque
    {
        return $this->marque;
    }

    public function setMarque(?Marque $marque): self
    {
        $this->marque = $marque;

        return $this;
    }

    public function getCouleur(): ?Couleur
    {
        return $this->couleur;
    }

    public function setCouleur(?Couleur $couleur): self
    {
        $this->couleur = $couleur;

        return $this;
    }

    public function getType(): ?Type
    {
        return $this->type;
    }

    public function setType(?Type $type): self
    {
        $this->type = $type;

        return $this;
    }
/*************pour la collection magasin, 2 id dans l'entity, pour aller chercher l'attribut, mettre des s*/

    /**
     * @return Collection<int, Magasin>
     */
    public function getMagasins(): Collection
    {
        return $this->magasins;
    }

    public function addMagasin(Magasin $magasin): self
    {
        if (!$this->magasins->contains($magasin)) {
            $this->magasins[] = $magasin;
        }

        return $this;
    }

    public function removeMagasin(Magasin $magasin): self
    {
        $this->magasins->removeElement($magasin);

        return $this;
    }
}
