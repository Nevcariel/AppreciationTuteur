<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TypeReponseRepository")
 */
class TypeReponse
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
    private $intitule;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Question", mappedBy="typeReponse", orphanRemoval=true)
     */
    private $question;

    /**
     * @ORM\Column(type="boolean")
     */
    private $choix;

    /**
     * @ORM\Column(type="boolean")
     */
    private $multiple;

    public function __construct()
    {
        $this->question = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getIntitule(): ?string
    {
        return $this->intitule;
    }

    public function setIntitule(string $intitule): self
    {
        $this->intitule = $intitule;

        return $this;
    }

    /**
     * @return Collection|Question[]
     */
    public function getQuestion(): Collection
    {
        return $this->question;
    }

    public function addQuestion(Question $question): self
    {
        if (!$this->question->contains($question)) {
            $this->question[] = $question;
            $question->setTypeReponse($this);
        }

        return $this;
    }

    public function removeQuestion(Question $question): self
    {
        if ($this->question->contains($question)) {
            $this->question->removeElement($question);
            // set the owning side to null (unless already changed)
            if ($question->getTypeReponse() === $this) {
                $question->setTypeReponse(null);
            }
        }

        return $this;
    }

    public function getChoix(): ?bool
    {
        return $this->choix;
    }

    public function setChoix(bool $choix): self
    {
        $this->choix = $choix;

        return $this;
    }

    public function getMultiple(): ?bool
    {
        return $this->multiple;
    }

    public function setMultiple(bool $multiple): self
    {
        $this->multiple = $multiple;

        return $this;
    }
}
