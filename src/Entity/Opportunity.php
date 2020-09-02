<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OpportunityRepository")
 */
class Opportunity
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
    private $cprospect;

    /**
     * @ORM\Column(type="string", length=125)
     */
    private $nomaffaire;

    /**
     * @ORM\Column(type="string", length=125, nullable=true)
     */
    private $source;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateecheance;


    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $datecreation;

    /**
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $montant;

    /**
     * @ORM\Column(type="string", length=125, nullable=true)
     */
    private $devise;

    /**
     * @ORM\Column(type="string", length=125)
     */
    private $etape;

    /**
     * @ORM\Column(type="string", length=125, nullable=true)
     */
    private $proba;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $brief;

    /**
     * @ORM\Column(type="string", length=125, nullable=true)
     */
    private $societe;

    /**
     * @ORM\Column(type="string", length=125, nullable=true)
     */
    private $archive;

    /**
     * @ORM\Column(type="integer")
     */
    private $idref;


    /**
     * @ORM\Column(type="array" )
     */
    private $comments;

    /**
     * @ORM\Column(type="array" )
     */
    private $notes;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCprospect(): ?string
    {
        return $this->cprospect;
    }

    public function setCprospect(string $cprospect): self
    {
        $this->cprospect = $cprospect;

        return $this;
    }

    public function getNomaffaire(): ?string
    {
        return $this->nomaffaire;
    }

    public function setNomaffaire(string $nomaffaire): self
    {
        $this->nomaffaire = $nomaffaire;

        return $this;
    }

    public function getSource(): ?string
    {
        return $this->source;
    }

    public function setSource(?string $source): self
    {
        $this->source = $source;

        return $this;
    }

    public function getDateecheance(): ?\DateTimeInterface
{
    return $this->dateecheance;
}

    public function setDateecheance(?\DateTimeInterface $dateecheance): self
    {
        $this->dateecheance = $dateecheance;

        return $this;
    }



    public function getdatecreation(): ?\DateTimeInterface
    {
        return $this->datecreation;
    }

    public function setdatecreation(?\DateTimeInterface $datecreation): self
    {
        $this->datecreation = $datecreation;

        return $this;
    }




    public function getMontant(): ?string
    {
        return $this->montant;
    }

    public function setMontant(?string $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getDevise(): ?string
    {
        return $this->devise;
    }

    public function setDevise(?string $devise): self
    {
        $this->devise = $devise;

        return $this;
    }

    public function getEtape(): ?string
    {
        return $this->etape;
    }

    public function setEtape(string $etape): self
    {
        $this->etape = $etape;

        return $this;
    }

    public function getProba(): ?string
    {
        return $this->proba;
    }

    public function setProba(?string $proba): self
    {
        $this->proba = $proba;

        return $this;
    }

    public function getBrief(): ?string
    {
        return $this->brief;
    }

    public function setBrief(?string $brief): self
    {
        $this->brief = $brief;

        return $this;
    }

    public function getSociete(): ?string
    {
        return $this->societe;
    }

    public function setSociete(?string $societe): self
    {
        $this->societe = $societe;

        return $this;
    }

    public function getArchive(): ?string
{
    return $this->archive;
}

    public function setArchive(?string $archive): self
    {
        $this->archive = $archive;

        return $this;
    }

    public function getComments()
    {
        return $this->comments;
    }

    public function setComments(?array $comments): self
    {
        $this->comments[] = $comments;

        return $this;
    }

    public function getnotes()
    {
        return $this->notes;
    }

    public function setnotes(?array $notes): self
    {
        $this->notes  = $notes;

        return $this;
    }

    public function getIdref(): ?int
    {
        return $this->idref;
    }

    public function setIdref(int $idref): self
    {
        $this->idref = $idref;

        return $this;
    }
}
