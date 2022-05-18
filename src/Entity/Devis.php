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

    public function getid(): ?int
    {
        return $this->id;
    }

    public function getdate_d(): ?\DateTimeInterface
    {
        return $this->date_d;
    }

    public function setdate_d(\DateTimeInterface $date_d): self
    {
        $this->date_d = $date_d;

        return $this;
    }

            
    public function getnumero_d(): ?int
    {
        return $this->numero_d;
    }

    public function setnumero_d(int $numero_d): self
    {
        $this->numero_d = $numero_d;

        return $this;
    }

    public function getrue_d(): ?string
    {
        return $this->rue_d;
    }

    public function setrued(string $rue_d): self
    {
        $this->rue_d = $rue_d;

        return $this;
    }

    public function getvoie_d(): ?string
    {
        return $this->voie_d;
    }

    public function setvoie_d(string $voie_d): self
    {
        $this->voie_d = $voie_d;

        return $this;
    }

    public function getcode_postal_d(): ?int
    {
        return $this->code_postal_d;
    }

    public function setcode_postal_d(int $code_postal_d): self
    {
        $this->code_postal_d = $code_postal_d;

        return $this;
    }

    public function getville_d(): ?string
    {
        return $this->ville_d;
    }

    public function setville_d(string $ville_d): self
    {
        $this->ville_d = $ville_d;

        return $this;
    }

    public function getmessage_d(): ?string
    {
        return $this->message_d;
    }

    public function setmessage_d(string $message_d): self
    {
        $this->message_d = $message_d;

        return $this;
    }

    public function getphot_d(): ?string
    {
        return $this->phot_d;
    }

    public function setphot_d(?string $phot_d): self
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

    public function getuser_repondre(): ?User
    {
        return $this->user_repondre;
    }

    public function setuser_repondre(?User $user_repondre): self
    {
        $this->user_repondre = $user_repondre;

        return $this;
    }
}