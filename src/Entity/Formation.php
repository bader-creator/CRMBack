<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FormationRepository")
 */
class Formation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=125)
     */
    private $titre;

    /**
     * @ORM\Column(type="date" , nullable=true)
     */
    private $date_formation;

    /**
     * @ORM\Column(type="string", length=100 , nullable=true)
     */
    private $formateur;

    /**
     * @ORM\Column(type="time" , nullable=true)
     */
    private $date_begin_formation;

    /**
     * @ORM\Column(type="time" ,nullable=true)
     */
    private $date_end_formation;

    /**
     * @ORM\Column(type="string", length=125 , nullable=true)
     */
    private $lieu_formation;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $review;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(?string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDateFormation(): ?\DateTimeInterface
    {
        return $this->date_formation;
    }

    public function setDateFormation(\DateTimeInterface $date_formation): self
    {
        $this->date_formation = $date_formation;

        return $this;
    }

    public function getFormateur(): ?string
    {
        return $this->formateur;
    }

    public function setFormateur(string $formateur): self
    {
        $this->formateur = $formateur;

        return $this;
    }

    public function getDateBeginFormation(): ?\DateTimeInterface
    {
        return $this->date_begin_formation;
    }

    public function setDateBeginFormation(\DateTimeInterface $date_begin_formation): self
    {
        $this->date_begin_formation = $date_begin_formation;

        return $this;
    }

    public function getDateEndFormation(): ?\DateTimeInterface
    {
        return $this->date_end_formation;
    }

    public function setDateEndFormation(\DateTimeInterface $date_end_formation): self
    {
        $this->date_end_formation = $date_end_formation;

        return $this;
    }

    public function getLieuFormation(): ?string
    {
        return $this->lieu_formation;
    }

    public function setLieuFormation(string $lieu_formation): self
    {
        $this->lieu_formation = $lieu_formation;

        return $this;
    }

    public function getReview(): ?string
    {
        return $this->review;
    }

    public function setReview(?string $review): self
    {
        $this->review = $review;

        return $this;
    }
}
