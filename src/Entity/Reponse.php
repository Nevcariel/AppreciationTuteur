<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ReponseRepository")
 */
class Reponse
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Enquete", inversedBy="reponses")
     * @ORM\JoinColumn(nullable=false)
     */
    private $enquete;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Tuteur", inversedBy="reponses")
     * @ORM\JoinColumn(nullable=false)
     */
    private $tuteur;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Question", inversedBy="reponses")
     * @ORM\JoinColumn(nullable=false)
     */
    private $question;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ReponsePossible", inversedBy="reponses")
     */
    private $reponse;

    public function getId()
    {
        return $this->id;
    }

    public function getEnquete(): ?Enquete
    {
        return $this->enquete;
    }

    public function setEnquete(?Enquete $enquete): self
    {
        $this->enquete = $enquete;

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

    public function getQuestion(): ?Question
    {
        return $this->question;
    }

    public function setQuestion(?Question $question): self
    {
        $this->question = $question;

        return $this;
    }

    public function getReponse(): ?ReponsePossible
    {
        return $this->reponse;
    }

    public function setReponse(?ReponsePossible $reponse): self
    {
        $this->reponse = $reponse;

        return $this;
    }
}
