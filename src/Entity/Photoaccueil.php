<?php

namespace App\Entity;

use App\Repository\PhotoaccueilRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PhotoaccueilRepository::class)]
class Photoaccueil
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 80)]
    private $carrouselp;

    #[ORM\Column(type: 'string', length: 80)]
    private $carrouseld;

    #[ORM\Column(type: 'string', length: 80)]
    private $carrouselt;

    #[ORM\Column(type: 'string', length: 80)]
    private $carrouselq;

    #[ORM\Column(type: 'string', length: 80)]
    private $carrouselc;

    #[ORM\Column(type: 'string', length: 80)]
    private $prestation;

    #[ORM\Column(type: 'string', length: 80)]
    private $pianod;

    #[ORM\Column(type: 'string', length: 80)]
    private $pianoaq;

    #[ORM\Column(type: 'string', length: 80)]
    private $diapason;

    #[ORM\Column(type: 'string', length: 80)]
    private $accessoir;

    #[ORM\Column(type: 'string', length: 80)]
    private $clef;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'photoaccueils')]
    #[ORM\JoinColumn(nullable: false)]
    private $user;

    #[ORM\Column(type: 'string', length: 80)]
    private $note;

    #[ORM\Column(type: 'string', length: 80)]
    private $video;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCarrouselp(): ?string
    {
        return $this->carrouselp;
    }

    public function setCarrouselp(string $carrouselp): self
    {
        $this->carrouselp = $carrouselp;

        return $this;
    }

    public function getCarrouseld(): ?string
    {
        return $this->carrouseld;
    }

    public function setCarrouseld(string $carrouseld): self
    {
        $this->carrouseld = $carrouseld;

        return $this;
    }

    public function getCarrouselt(): ?string
    {
        return $this->carrouselt;
    }

    public function setCarrouselt(string $carrouselt): self
    {
        $this->carrouselt = $carrouselt;

        return $this;
    }

    public function getCarrouselq(): ?string
    {
        return $this->carrouselq;
    }

    public function setCarrouselq(string $carrouselq): self
    {
        $this->carrouselq = $carrouselq;

        return $this;
    }

    public function getCarrouselc(): ?string
    {
        return $this->carrouselc;
    }

    public function setCarrouselc(string $carrouselc): self
    {
        $this->carrouselc = $carrouselc;

        return $this;
    }

    public function getPrestation(): ?string
    {
        return $this->prestation;
    }

    public function setPrestation(string $prestation): self
    {
        $this->prestation = $prestation;

        return $this;
    }

    public function getPianod(): ?string
    {
        return $this->pianod;
    }

    public function setPianod(string $pianod): self
    {
        $this->pianod = $pianod;

        return $this;
    }

    public function getPianoaq(): ?string
    {
        return $this->pianoaq;
    }

    public function setPianoaq(string $pianoaq): self
    {
        $this->pianoaq = $pianoaq;

        return $this;
    }

    public function getDiapason(): ?string
    {
        return $this->diapason;
    }

    public function setDiapason(string $diapason): self
    {
        $this->diapason = $diapason;

        return $this;
    }

    public function getAccessoir(): ?string
    {
        return $this->accessoir;
    }

    public function setAccessoir(string $accessoir): self
    {
        $this->accessoir = $accessoir;

        return $this;
    }

    public function getClef(): ?string
    {
        return $this->clef;
    }

    public function setClef(string $clef): self
    {
        $this->clef = $clef;

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

    public function getNote(): ?string
    {
        return $this->note;
    }

    public function setNote(string $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getVideo(): ?string
    {
        return $this->video;
    }

    public function setVideo(string $video): self
    {
        $this->video = $video;

        return $this;
    }
}
