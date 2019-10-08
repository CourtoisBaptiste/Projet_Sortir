<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\InscriptionRepository")
 */
class Inscription
{
    /**
     * @ORM\Column(type="integer")
     */
    private $id_participant;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_sortie;

    /**
     * @ORM\Column(type="date")
     */
    private $dateInscription;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdParticipant(): ?int
    {
        return $this->id_participant;
    }

    public function setIdParticipant(int $id_participant): self
    {
        $this->id_participant = $id_participant;

        return $this;
    }

    public function getIdSortie(): ?int
    {
        return $this->id_sortie;
    }

    public function setIdSortie(int $id_sortie): self
    {
        $this->id_sortie = $id_sortie;

        return $this;
    }

    public function getDateInscription(): ?\DateTimeInterface
    {
        return $this->dateInscription;
    }

    public function setDateInscription(\DateTimeInterface $dateInscription): self
    {
        $this->dateInscription = $dateInscription;

        return $this;
    }
}
