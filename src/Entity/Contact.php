<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ContactRepository")
 */
class Contact
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
    private $fullname;

    /**
     * @ORM\Column(type="date" , nullable=true)
     */
    private $date_de_naissance;

    /**
     * @ORM\Column(type="string", length=125 , nullable=true)
     */
    private $fonction;

    /**
     * @ORM\Column(type="string", length=125 ,nullable=true)
     */
    private $organisme;

    /**
     * @ORM\Column(type="string", length=125, nullable=true)
     */
    private $pays;

    /**
     * @ORM\Column(type="string", length=200  , nullable=true)
     */
    private $tel;

    /**
     * @ORM\Column(type="string", length=200  , nullable=true)
     */
    private $tel1;


    /**
     * @ORM\Column(type="string", length=200  , nullable=true)
     */
    private $tel2;

    /**
     * @ORM\Column(type="string", length=125 , nullable=true)
     */
    private $mail;

    /**
     * @ORM\Column(type="string", length=125 , nullable=true)
     */
    private $mail2;

    /**
     * @ORM\Column(type="string", length=125 , nullable=true)
     */
    private $adresse;

    /**
     * @ORM\Column(type="text" ,nullable=true)
     */
    private $commentaire;


    /**
     * @ORM\Column(type="string", length=125 , nullable=true)
     */
    private $facebook;

    /**
     * @ORM\Column(type="string", length=125 , nullable=true)
     */
    private $twitter;


    /**
     * @ORM\Column(type="string", length=125 , nullable=true)
     */
    private $linkedin;


    /**
     * @ORM\Column(type="string", length=125 , nullable=true)
     */
    private $viadio;













    /**
     * @ORM\Column(type="string", length=125 )
     */
    private $nature_de_contact;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $cadre_de_rencontre;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFullname(): ?string
    {
        return $this->fullname;
    }

    public function setFullname(string $fullname): self
    {
        $this->fullname = $fullname;

        return $this;
    }

    public function getDateDeNaissance(): ?\DateTimeInterface
    {
        return $this->date_de_naissance;
    }

    public function setDateDeNaissance(\DateTimeInterface $date_de_naissance): self
    {
        $this->date_de_naissance = $date_de_naissance;

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

    public function getOrganisme(): ?string
    {
        return $this->organisme;
    }

    public function setOrganisme(string $organisme): self
    {
        $this->organisme = $organisme;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(string $pays): self
    {
        $this->pays = $pays;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(string $tel): self
    {
        $this->tel = $tel;

        return $this;
    }


    public function getTel1(): ?string
    {
        return $this->tel1;
    }

    public function setTel1(string $tel): self
    {
        $this->tel1 = $tel;

        return $this;
    }



    public function getTel2(): ?string
    {
        return $this->tel2;
    }

    public function setTel2(string $tel): self
    {
        $this->tel2 = $tel;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }


    public function getMail2(): ?string
    {
        return $this->mail2;
    }

    public function setMail2(string $mail): self
    {
        $this->mail2 = $mail;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }






    public function getFacebook(): ?string
    {
        return $this->facebook;
    }

    public function setFacebook(string $adresse): self
    {
        $this->facebook = $adresse;

        return $this;
    }



    public function getTwitter(): ?string
    {
        return $this->twitter;
    }

    public function setTwitter(string $adresse): self
    {
        $this->twitter = $adresse;

        return $this;
    }


    public function getLinkedin(): ?string
    {
        return $this->linkedin;
    }

    public function setLinkedin(string $adresse): self
    {
        $this->linkedin = $adresse;

        return $this;
    }



    public function getViadio(): ?string
    {
        return $this->viadio;
    }

    public function setViadio(string $adresse): self
    {
        $this->viadio = $adresse;

        return $this;
    }







    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(string $commentaire): self
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    public function getNatureDeContact(): ?string
    {
        return $this->nature_de_contact;
    }

    public function setNatureDeContact(string $nature_de_contact): self
    {
        $this->nature_de_contact = $nature_de_contact;

        return $this;
    }

    public function getCadreDeRencontre(): ?string
    {
        return $this->cadre_de_rencontre;
    }

    public function setCadreDeRencontre(?string $cadre_de_rencontre): self
    {
        $this->cadre_de_rencontre = $cadre_de_rencontre;

        return $this;
    }
}
