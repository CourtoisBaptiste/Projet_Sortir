<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SortieRepository")
 */
class Sortie
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
     * @ORM\Column(type="date")
     */
    private $dateHeureDebut;

    /**
     * @ORM\Column(type="date")
     */
    private $duree;

    /**
     * @ORM\Column(type="date")
     */
    private $dateLimiteInscription;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbIncriptionMax;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $url_photo;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_organisateur;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_campus;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_lieu;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_etat;

    public function getId(): ?int
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

    public function getDateHeureDebut(): ?\DateTimeInterface
    {
        return $this->dateHeureDebut;
    }

    public function setDateHeureDebut(\DateTimeInterface $dateHeureDebut): self
    {
        $this->dateHeureDebut = $dateHeureDebut;

        return $this;
    }

    public function getDuree(): ?\DateTimeInterface
    {
        return $this->duree;
    }

    public function setDuree(\DateTimeInterface $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    public function getDateLimiteInscription(): ?\DateTimeInterface
    {
        return $this->dateLimiteInscription;
    }

    public function setDateLimiteInscription(\DateTimeInterface $dateLimiteInscription): self
    {
        $this->dateLimiteInscription = $dateLimiteInscription;

        return $this;
    }

    public function getNbIncriptionMax(): ?int
    {
        return $this->nbIncriptionMax;
    }

    public function setNbIncriptionMax(int $nbIncriptionMax): self
    {
        $this->nbIncriptionMax = $nbIncriptionMax;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getUrlPhoto(): ?string
    {
        return $this->url_photo;
    }

    public function setUrlPhoto(?string $url_photo): self
    {
        $this->url_photo = $url_photo;

        return $this;
    }

    public function getIdOrganisateur(): ?int
    {
        return $this->id_organisateur;
    }

    public function setIdOrganisateur(int $id_organisateur): self
    {
        $this->id_organisateur = $id_organisateur;

        return $this;
    }

    public function getIdCampus(): ?int
    {
        return $this->id_campus;
    }

    public function setIdCampus(int $id_campus): self
    {
        $this->id_campus = $id_campus;

        return $this;
    }

    public function getIdLieu(): ?int
    {
        return $this->id_lieu;
    }

    public function setIdLieu(int $id_lieu): self
    {
        $this->id_lieu = $id_lieu;

        return $this;
    }

    public function getIdEtat(): ?int
    {
        return $this->id_etat;
    }

    public function setIdEtat(int $id_etat): self
    {
        $this->id_etat = $id_etat;

        return $this;
    }
}
