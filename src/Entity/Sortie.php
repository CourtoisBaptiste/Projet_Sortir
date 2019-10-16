<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     * @ORM\Column(type="datetime")
     */
    private $dateHeureDebut;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateLimiteInscription;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $duree;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbInscriptionsMax;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $descriptionSortie;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Etat", inversedBy="sorties")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idEtat;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Lieu", inversedBy="sorties")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idLieu;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Campus", inversedBy="sorties")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idCampus;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Participant", inversedBy="sorties")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idOrganisateur;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Participant", inversedBy="sortiesParticipants")
     */
    private $dateInscription;

    public function __construct()
    {
        $this->dateInscription = new ArrayCollection();
    }

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

    public function getDateLimiteInscription(): ?\DateTimeInterface
    {
        return $this->dateLimiteInscription;
    }

    public function setDateLimiteInscription(\DateTimeInterface $dateLimiteInscription): self
    {
        $this->dateLimiteInscription = $dateLimiteInscription;

        return $this;
    }

    public function getDuree(): ?int
    {
        return $this->duree;
    }

    public function setDuree(?int $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    public function getNbInscriptionsMax(): ?int
    {
        return $this->nbInscriptionsMax;
    }

    public function setNbInscriptionsMax(int $nbInscriptionsMax): self
    {
        $this->nbInscriptionsMax = $nbInscriptionsMax;

        return $this;
    }

    public function getDescriptionSortie(): ?string
    {
        return $this->descriptionSortie;
    }

    public function setDescriptionSortie(?string $descriptionSortie): self
    {
        $this->descriptionSortie = $descriptionSortie;

        return $this;
    }

    public function getIdEtat(): ?Etat
    {
        return $this->idEtat;
    }

    public function setIdEtat(?Etat $idEtat): self
    {
        $this->idEtat = $idEtat;

        return $this;
    }

    public function getIdLieu(): ?Lieu
    {
        return $this->idLieu;
    }

    public function setIdLieu(?Lieu $idLieu): self
    {
        $this->idLieu = $idLieu;

        return $this;
    }

    public function getIdCampus(): ?Campus
    {
        return $this->idCampus;
    }

    public function setIdCampus(?Campus $idCampus): self
    {
        $this->idCampus = $idCampus;

        return $this;
    }

    public function getIdOrganisateur(): ?Participant
    {
        return $this->idOrganisateur;
    }

    public function setIdOrganisateur(?Participant $idOrganisateur): self
    {
        $this->idOrganisateur = $idOrganisateur;

        return $this;
    }

    /**
     * @return Collection|Participant[]
     */
    public function getDateInscription(): Collection
    {
        return $this->dateInscription;
    }

    public function addDateInscription(Participant $dateInscription): self
    {
        if (!$this->dateInscription->contains($dateInscription)) {
            $this->dateInscription[] = $dateInscription;
        }

        return $this;
    }

    public function removeDateInscription(Participant $dateInscription): self
    {
        if ($this->dateInscription->contains($dateInscription)) {
            $this->dateInscription->removeElement($dateInscription);
        }

        return $this;
    }
}
