<?php

namespace App\Entity;

//use App\Entity\User;
use Doctrine\ORM\Mapping as ORM;
//use Doctrine\Common\Collections\Collection;
use App\Repository\DevisRepository;
// use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: DevisRepository::class)]
class Devis
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'datetime')]
    private $date_d;
            
    #[ORM\Column(type: 'integer')]
    private $numero_d;

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

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $phot_d;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'devis')]
    #[ORM\JoinColumn(nullable: false)]
    private $user;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'nom')]
    private $user_repondre;

    // public function __construct()
    // {
    //     $this->user = new ArrayCollection();
    // }

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

            
    public function getNumeroD(): ?int
    {
        return $this->numero_d;
    }

    public function setNumeroD(int $numero_d): self
    {
        $this->numero_d = $numero_d;

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

    public function getPhotD(): ?string
    {
        return $this->phot_d;
    }

    public function setPhotD(?string $phot_d): self
    {
        $this->phot_d = $phot_d;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getUserRepondre(): ?User
    {
        return $this->user_repondre;
    }

    public function setUserRepondre(?User $user_repondre): self
    {
        $this->user_repondre = $user_repondre;

        return $this;
    }
}