<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EnqueteRepository")
 */
class Enquete
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Stage", inversedBy="enquete", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $stage;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Tuteur", inversedBy="enquetes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $tuteur;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateCreation;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Reponse", mappedBy="enquete")
     */
    private $reponses;

    public function __construct()
    {
        $this->reponses = new ArrayCollection();
        $this->dateCreation = new \DateTime();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getStage(): ?Stage
    {
        return $this->stage;
    }

    public function setStage(Stage $stage): self
    {
        $this->stage = $stage;

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

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->dateCreation;
    }

    public function setDateCreation(\DateTimeInterface $dateCreation): self
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * @return Collection|Reponse[]
     */
    public function getReponses(): Collection
    {
        return $this->reponses;
    }

    public function addReponse(Reponse $reponse): self
    {
        if (!$this->reponses->contains($reponse)) {
            $this->reponses[] = $reponse;
            $reponse->setEnquete($this);
        }

        return $this;
    }

    public function removeReponse(Reponse $reponse): self
    {
        if ($this->reponses->contains($reponse)) {
            $this->reponses->removeElement($reponse);
            // set the owning side to null (unless already changed)
            if ($reponse->getEnquete() === $this) {
                $reponse->setEnquete(null);
            }
        }

        return $this;
    }
}
