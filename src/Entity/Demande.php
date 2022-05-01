<?php

namespace App\Entity;

use App\Repository\DemandeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DemandeRepository::class)]
class Demande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'datetime')]
    private $date_d;

    #[ORM\Column(type: 'string', length: 5)]
    private $civilite_d;

    #[ORM\Column(type: 'string', length: 50)]
    private $nom_d;

    #[ORM\Column(type: 'string', length: 50)]
    private $prenom_d;

    #[ORM\Column(type: 'string', length: 50)]
    private $tel_d;

    #[ORM\Column(type: 'integer')]
    private $n°_d;

    #[ORM\Column(type: 'string', length: 50)]
    private $rue_d;

    #[ORM\Column(type: 'string', length: 50)]
    private $voie_d;

    #[ORM\Column(type: 'integer')]
    private $code_postal_d;

    #[ORM\Column(type: 'string', length: 50)]
    private $ville_d;

    #[ORM\Column(type: 'string', length: 255)]
    private $message_d;

    #[ORM\Column(type: 'string', length: 200, nullable: true)]
    private $photo_d;




    
     #[ORM\Column(type: 'string', length: 255)]
    private $slug;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateD(): ?\DateTimeInterface
    {
        return $this->date_d;
    }

    public function setDateD(\DateTimeInterface $date_d): self
    {
        $this->date_d = $date_d;

        return $this;
    }

    public function getCiviliteD(): ?string
    {
        return $this->civilite_d;
    }

    public function setCiviliteD(string $civilite_d): self
    {
        $this->civilite_d = $civilite_d;

        return $this;
    }

    public function getNomD(): ?string
    {
        return $this->nom_d;
    }

    public function setNomD(string $nom_d): self
    {
        $this->nom_d = $nom_d;

        return $this;
    }

    public function getPrenomD(): ?string
    {
        return $this->prenom_d;
    }

    public function setPrenomD(string $prenom_d): self
    {
        $this->prenom_d = $prenom_d;

        return $this;
    }

    public function getTelD(): ?string
    {
        return $this->tel_d;
    }

    public function setTelD(string $tel_d): self
    {
        $this->tel_d = $tel_d;

        return $this;
    }

    public function getN°D(): ?int
    {
        return $this->n°_d;
    }

    public function setN°D(int $n°_d): self
    {
        $this->n°_d = $n°_d;

        return $this;
    }

    public function getRueD(): ?string
    {
        return $this->rue_d;
    }

    public function setRueD(string $rue_d): self
    {
        $this->rue_d = $rue_d;

        return $this;
    }

    public function getVoieD(): ?string
    {
        return $this->voie_d;
    }

    public function setVoieD(string $voie_d): self
    {
        $this->voie_d = $voie_d;

        return $this;
    }

    public function getCodePostalD(): ?int
    {
        return $this->code_postal_d;
    }

    public function setCodePostalD(int $code_postal_d): self
    {
        $this->code_postal_d = $code_postal_d;

        return $this;
    }

    public function getVilleD(): ?string
    {
        return $this->ville_d;
    }

    public function setVilleD(string $ville_d): self
    {
        $this->ville_d = $ville_d;

        return $this;
    }

    public function getMessageD(): ?string
    {
        return $this->message_d;
    }

    public function setMessageD(string $message_d): self
    {
        $this->message_d = $message_d;

        return $this;
    }

    public function getPhotoD(): ?string
    {
        return $this->photo_d;
    }

    public function setPhotoD(?string $photo_d): self
    {
        $this->photo_d = $photo_d;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }
}
