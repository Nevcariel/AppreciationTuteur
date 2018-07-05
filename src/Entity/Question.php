<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\QuestionRepository")
 */
class Question
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $contenu;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TypeReponse", inversedBy="question")
     * @ORM\JoinColumn(nullable=false)
     */
    private $typeReponse;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ReponsePossible", mappedBy="question", orphanRemoval=true)
     */
    private $reponsesPossibles;


    public function __construct()
    {
        $this->reponses = new ArrayCollection();
        $this->reponsesPossibles = new ArrayCollection();
    }

    public function __toString(): ?string
    {
        return $this->contenu;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): self
    {
        $this->contenu = $contenu;

        return $this;
    }

    public function getTypeReponse(): ?TypeReponse
    {
        return $this->typeReponse;
    }

    public function setTypeReponse(?TypeReponse $typeReponse): self
    {
        $this->typeReponse = $typeReponse;

        return $this;
    }

    /**
     * @return Collection|ReponsePossible[]
     */
    public function getReponsesPossibles(): Collection
    {
        return $this->reponsesPossibles;
    }

    public function addReponsesPossible(ReponsePossible $reponsesPossible): self
    {
        if (!$this->reponsesPossibles->contains($reponsesPossible)) {
            $this->reponsesPossibles[] = $reponsesPossible;
            $reponsesPossible->setQuestion($this);
        }

        return $this;
    }

    public function removeReponsesPossible(ReponsePossible $reponsesPossible): self
    {
        if ($this->reponsesPossibles->contains($reponsesPossible)) {
            $this->reponsesPossibles->removeElement($reponsesPossible);
            // set the owning side to null (unless already changed)
            if ($reponsesPossible->getQuestion() === $this) {
                $reponsesPossible->setQuestion(null);
            }
        }

        return $this;
    }
}
