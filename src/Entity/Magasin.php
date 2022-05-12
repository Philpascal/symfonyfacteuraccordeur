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

    #[ORM\Column(type: 'string', length: 150)]
    private $nom_mag;

    #[ORM\Column(type: 'integer')]
    private $numero_mag;

    #[ORM\Column(type: 'string', length: 50)]
    private $rue_mag;

    #[ORM\Column(type: 'string', length: 50)]
    private $voie_mag;

    #[ORM\Column(type: 'string', length: 50)]
    private $code_postal_mag;

    #[ORM\Column(type: 'string', length: 50)]
    private $ville_mag;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomMag(): ?string
    {
        return $this->nom_mag;
    }

    public function setNomMag(string $nom_mag): self
    {
        $this->nom_mag = $nom_mag;

        return $this;
    }

    public function getNumeroMag(): ?int
    {
        return $this->numero_mag;
    }

    public function setNumeroMag(int $numero_mag): self
    {
        $this->numero_mag = $numero_mag;

        return $this;
    }

    public function getRueMag(): ?string
    {
        return $this->rue_mag;
    }

    public function setRueMag(string $rue_mag): self
    {
        $this->rue_mag = $rue_mag;

        return $this;
    }

    public function getVoieMag(): ?string
    {
        return $this->voie_mag;
    }

    public function setVoieMag(string $voie_mag): self
    {
        $this->voie_mag = $voie_mag;

        return $this;
    }

    public function getCodePostalMag(): ?string
    {
        return $this->code_postal_mag;
    }

    public function setCodePostalMag(string $code_postal_mag): self
    {
        $this->code_postal_mag = $code_postal_mag;

        return $this;
    }

    public function getVilleMag(): ?string
    {
        return $this->ville_mag;
    }

    public function setVilleMag(string $ville_mag): self
    {
        $this->ville_mag = $ville_mag;

        return $this;
    }

    
}
