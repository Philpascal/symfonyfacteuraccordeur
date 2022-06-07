<?php

namespace App\Entity;

use App\Repository\MarqueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MarqueRepository::class)]
class Marque
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 50)]
    private $nom;

    #[ORM\OneToMany(mappedBy: 'appeler', targetEntity: Produit::class)]
    private $appeler;

    
    public function __construct()
    {
        $this->appeler = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->nom;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection<int, Produit>
     */
    public function getAppeler(): Collection
    {
        return $this->appeler;
    }

    public function addAppeler(Produit $appeler): self
    {
        if (!$this->appeler->contains($appeler)) {
            $this->appeler[] = $appeler;
            $appeler->setAppeler($this);
        }

        return $this;
    }

    public function removeAppeler(Produit $appeler): self
    {
        if ($this->appeler->removeElement($appeler)) {
            // set the owning side to null (unless already changed)
            if ($appeler->getAppeler() === $this) {
                $appeler->setAppeler(null);
            }
        }

        return $this;
    }

   
}
