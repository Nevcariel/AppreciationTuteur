<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StageRepository")
 */
class Stage
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $dateDebut;

    /**
     * @ORM\Column(type="date")
     */
    private $dateFin;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Duree", inversedBy="stages")
     */
    private $duree;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Difficulte", inversedBy="stages")
     */
    private $difficulte;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Stagiaire", inversedBy="stage", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $stagiaire;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Enquete", mappedBy="stage", cascade={"persist", "remove"})
     */
    private $enquete;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Tuteur", inversedBy="stages")
     */
    private $tuteur;

    public function getId()
    {
        return $this->id;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }

    public function setDateFin(\DateTimeInterface $dateFin): self
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    public function getDuree(): ?Duree
    {
        return $this->duree;
    }

    public function setDuree(?Duree $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    public function getDifficulte(): ?Difficulte
    {
        return $this->difficulte;
    }

    public function setDifficulte(?Difficulte $difficulte): self
    {
        $this->difficulte = $difficulte;

        return $this;
    }

    public function getStagiaire(): ?Stagiaire
    {
        return $this->stagiaire;
    }

    public function setStagiaire(Stagiaire $stagiaire): self
    {
        $this->stagiaire = $stagiaire;

        return $this;
    }

    public function getEnquete(): ?Enquete
    {
        return $this->enquete;
    }

    public function setEnquete(Enquete $enquete): self
    {
        $this->enquete = $enquete;

        // set the owning side of the relation if necessary
        if ($this !== $enquete->getStage()) {
            $enquete->setStage($this);
        }

        return $this;
    }

    public function getTuteur(): ?Tuteur
    {
        return $this->tuteur;
    }

    public function setTuteur(?Tuteur $tuteur): self
    {
        $this->tuteur = $tuteur;

        return $this;
    }
}
