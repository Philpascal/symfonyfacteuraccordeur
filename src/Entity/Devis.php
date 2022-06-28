<?php

namespace App\Entity;

// use Symfony\Component\Validator\Constraints as Assert;/***********pattern********* */
use Doctrine\ORM\Mapping as ORM;
use App\Repository\DevisRepository;
use Gedmo\Mapping\Annotation as Gedmo;/************************date auto************* */

#[ORM\Entity(repositoryClass: DevisRepository::class)]
class Devis
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;
    /*date auto*******************************************************************************/
    /**
     * @Gedmo\Timestampable(on="create")
     */
    #[ORM\Column(type: 'datetime_immutable')]/************date auto*************************** */
    private $date;
    
    #[ORM\Column(type: 'integer')]
    private $numero;

    /**
    * Assert\Regex(
    *     pattern="/[0][0-9]{4}/"
    * )
    */
    #[ORM\Column(type: 'string', length: 5)]
    private $codepostal;
    // #[ORM\Column(type: 'integer')]
    // private $codepostal;

    #[ORM\Column(type: 'string', length: 50)]
    private $ville;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'devis')]
    #[ORM\JoinColumn(nullable: true)]
    private $user;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'nom')]
    private $userrepondre;

    #[ORM\Column(type: 'string', length: 30)]
    private $voie;

    #[ORM\Column(type: 'string', length: 255)]
    private $message;
    #[ORM\Column(type: 'text', nullable: true)]
    private $reponse;

    #[ORM\Column(type: 'datetime_immutable', nullable: true)]/****************************************date auto */
    private $datereponse;

    public function getId(): ?int
    {
        return $this->id;
    }
    
    public function getDate(): ?\DateTimeImmutable/*************************************date auto */
    {
        return $this->date;
    }
/*******************************************date auto****************************************************** */
    // public function setDate(\DateTimeInterface $date): self
    // {
    //     $this->date = $date;
    //     return $this;
    // }
            
    public function getNumero(): ?int
    {
        return $this->numero;
    }

    public function setNumero(int $numero): self
    {
        $this->numero = $numero;
        return $this;
    }

    public function getCodepostal(): ?string
    {
        return $this->codepostal;
    }

    public function setCodepostal(string $codepostal): self
    {
        $this->codepostal = $codepostal;
        return $this;
    }
    // public function getCodepostal(): ?int
    // {
    //     return $this->codepostal;
    // }

    // public function setCodepostal(int $codepostal): self
    // {
    //     $this->codepostal = $codepostal;
    //     return $this;
    // }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;
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

    public function getVoie(): ?string
    {
        return $this->voie;
    }

    public function setVoie(string $voie): self
    {
        $this->voie = $voie;
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

    public function getReponse(): ?string
    {
        return $this->reponse;
    }

    public function setReponse(?string $reponse): self
    {
        $this->reponse = $reponse;
        return $this;
    }

    public function getDatereponse(): ?\DateTimeImmutable/*************************************date auto */
    {
        return $this->datereponse;
    }

    public function setDatereponse(?\DateTimeImmutable $datereponse): self/**************************************date auto */
    {
        $this->datereponse = $datereponse;
        return $this;
    }
}