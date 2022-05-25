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
    private $date;
            
    #[ORM\Column(type: 'integer')]
    private $numero;

    // #[ORM\Column(type: 'string', length: 30)]  /**length: 50 */
    // private $rue;

    // #[ORM\Column(type: 'string', length: 50)]
    // private $voie;

    #[ORM\Column(type: 'integer')]
    private $codepostal;

    #[ORM\Column(type: 'string', length: 50)]
    private $ville;

    // #[ORM\Column(type: 'string', length: 255)]
    // private $message;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $photo;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'devis')]
    #[ORM\JoinColumn(nullable: false)]
    private $user;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'nom')]
    private $userrepondre;

    #[ORM\Column(type: 'string', length: 30)]
    private $rue;

    #[ORM\Column(type: 'string', length: 255)]
    private $message;

    // public function __construct()
    // {
    //     $this->user = new ArrayCollection();
    // }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

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

    // public function getRue(): ?string
    // {
    //     return $this->rue;
    // }

    // public function setRue(string $rue): self
    // {
    //     $this->rue = $rue;

    //     return $this;
    // }

    // public function getVoie(): ?string
    // {
    //     return $this->voie;
    // }

    // public function setVoie(string $voie): self
    // {
    //     $this->voie = $voie;

    //     return $this;
    // }

    public function getCodepostal(): ?int
    {
        return $this->codepostal;
    }

    public function setCodepostal(int $codepostal): self
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

    // public function getMessage(): ?string
    // {
    //     return $this->message;
    // }

    // public function setMessage(string $message): self
    // {
    //     $this->message = $message;

    //     return $this;
    // }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;

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

    public function getUserrepondre(): ?User
    {
        return $this->userrepondre;
    }

    public function setUserrepondre(?User $userrepondre): self
    {
        $this->userrepondre = $userrepondre;

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

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }
}