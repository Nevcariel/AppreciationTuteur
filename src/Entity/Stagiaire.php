<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StagiaireRepository")
 */
class Stagiaire
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Formation", inversedBy="stagiaires")
     * @ORM\JoinColumn(nullable=false)
     */
    private $formation;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Stage", mappedBy="stagiaire", cascade={"persist", "remove"})
     */
    private $stage;

    public function __toString(): ?string
    {
        $res = $this->prenom." ".$this->nom;
        return $res;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getFormation(): ?Formation
    {
        return $this->formation;
    }

    public function setFormation(?Formation $formation): self
    {
        $this->formation = $formation;

        return $this;
    }

    public function getStage(): ?Stage
    {
        return $this->stage;
    }

    public function setStage(Stage $stage): self
    {
        $this->stage = $stage;

        // set the owning side of the relation if necessary
        if ($this !== $stage->getStagiaire()) {
            $stage->setStagiaire($this);
        }

        return $this;
    }
}
