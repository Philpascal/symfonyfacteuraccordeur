<?php

namespace App\Entity;

use App\Repository\MagasinRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MagasinRepository::class)]
class Magasin
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 50)]
    private $nom;

    #[ORM\Column(type: 'integer')]
    private $numero;

    #[ORM\Column(type: 'string', length: 30)]
    private $rue;

    // #[ORM\Column(type: 'string', length: 50)]
    // private $voie_mag;

    #[ORM\Column(type: 'integer')]
    private $codepostal;

    #[ORM\Column(type: 'string', length: 50)]
    private $ville;

    public function __toString()
    {
        return $this->nom . ' ' . $this->numero . ' ' . $this->rue . ' ' . $this->codepostal . ' ' . $this->ville;
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

    public function getNumero(): ?int
    {
        return $this->numero;
    }

    public function setNumero(int $numero): self
    {
        $this->numero = $numero;
        return $this;
    }

    public function getRue(): ?string
    {
        return $this->rue;
    }

    public function setRue(string $rue): self
    {
        $this->rue = $rue;
        return $this;
    }

    // public function getVoieMag(): ?string
    // {
    //     return $this->voie_mag;
    // }

    // public function setVoieMag(string $voie_mag): self
    // {
    //     $this->voie_mag = $voie_mag;

    //     return $this;
    // }

    public function getCodePostal(): ?int
    {
        return $this->codepostal;
    }

    public function setCodePostal(string $codepostal): self
    {
        $this->codepostal = $codepostal;
        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;
        return $this;
    }
}
