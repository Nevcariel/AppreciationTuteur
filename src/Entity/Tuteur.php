<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TuteurRepository")
 */
class Tuteur
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
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fonction;

    /**
     * @ORM\Column(type="boolean")
     */
    private $informatique;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Entreprise", inversedBy="tuteurs")
     */
    private $entreprise;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Domaine", mappedBy="tuteurs")
     */
    private $domaines;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Enquete", mappedBy="tuteur")
     */
    private $enquetes;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Reponse", mappedBy="tuteur", orphanRemoval=true, cascade={"persist"})
     */
    private $reponses;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Stage", mappedBy="tuteur")
     */
    private $stages;

    public function __construct()
    {
        $this->domaines = new ArrayCollection();
        $this->enquetes = new ArrayCollection();
        $this->reponses = new ArrayCollection();
        $this->stages = new ArrayCollection();
    }

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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getFonction(): ?string
    {
        return $this->fonction;
    }

    public function setFonction(string $fonction): self
    {
        $this->fonction = $fonction;

        return $this;
    }

    public function getInformatique(): ?bool
    {
        return $this->informatique;
    }

    public function setInformatique(bool $informatique): self
    {
        $this->informatique = $informatique;

        return $this;
    }

    public function getEntreprise(): ?Entreprise
    {
        return $this->entreprise;
    }

    public function setEntreprise(?Entreprise $entreprise): self
    {
        $this->entreprise = $entreprise;

        return $this;
    }

    /**
     * @return Collection|Domaine[]
     */
    public function getDomaines(): Collection
    {
        return $this->domaines;
    }

    public function addDomaine(Domaine $domaine): self
    {
        if (!$this->domaines->contains($domaine)) {
            $this->domaines[] = $domaine;
            $domaine->addTuteur($this);
        }

        return $this;
    }

    public function removeDomaine(Domaine $domaine): self
    {
        if ($this->domaines->contains($domaine)) {
            $this->domaines->removeElement($domaine);
            $domaine->removeTuteur($this);
        }

        return $this;
    }

    /**
     * @return Collection|Enquete[]
     */
    public function getEnquetes(): Collection
    {
        return $this->enquetes;
    }

    public function addEnquete(Enquete $enquete): self
    {
        if (!$this->enquetes->contains($enquete)) {
            $this->enquetes[] = $enquete;
            $enquete->setTuteur($this);
        }

        return $this;
    }

    public function removeEnquete(Enquete $enquete): self
    {
        if ($this->enquetes->contains($enquete)) {
            $this->enquetes->removeElement($enquete);
            // set the owning side to null (unless already changed)
            if ($enquete->getTuteur() === $this) {
                $enquete->setTuteur(null);
            }
        }

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
            $reponse->setTuteur($this);
        }

        return $this;
    }

    public function removeReponse(Reponse $reponse): self
    {
        if ($this->reponses->contains($reponse)) {
            $this->reponses->removeElement($reponse);
            // set the owning side to null (unless already changed)
            if ($reponse->getTuteur() === $this) {
                $reponse->setTuteur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Stage[]
     */
    public function getStages(): Collection
    {
        return $this->stages;
    }

    public function addStage(Stage $stage): self
    {
        if (!$this->stages->contains($stage)) {
            $this->stages[] = $stage;
            $stage->setTuteur($this);
        }

        return $this;
    }

    public function removeStage(Stage $stage): self
    {
        if ($this->stages->contains($stage)) {
            $this->stages->removeElement($stage);
            // set the owning side to null (unless already changed)
            if ($stage->getTuteur() === $this) {
                $stage->setTuteur(null);
            }
        }

        return $this;
    }
}
