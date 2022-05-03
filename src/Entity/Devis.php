<?php

namespace App\Entity;

use App\Repository\DevisRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DevisRepository::class)]
class Devis
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

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $phot_d;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'devis')]
    #[ORM\JoinColumn(nullable: false)]
    private $user;

    #[ORM\OneToMany(mappedBy: 'user_repondre', targetEntity: User::class)]
    private $user_repondre;
    
    public function __construct()
    {
        $this->user = new ArrayCollection();
        $this->user_répondre = new ArrayCollection();
        $this->user_repondre = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, User>
     */
    public function getUserRepondre(): Collection
    {
        return $this->user_repondre;
    }

    public function addUserRepondre(User $userRepondre): self
    {
        if (!$this->user_repondre->contains($userRepondre)) {
            $this->user_repondre[] = $userRepondre;
            $userRepondre->setUserRepondre($this);
        }

        return $this;
    }

    public function removeUserRepondre(User $userRepondre): self
    {
        if ($this->user_repondre->removeElement($userRepondre)) {
            // set the owning side to null (unless already changed)
            if ($userRepondre->getUserRepondre() === $this) {
                $userRepondre->setUserRepondre(null);
            }
        }

        return $this;
    }
}
