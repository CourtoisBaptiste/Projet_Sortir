<?php

namespace App\Entity;

use App\Entity\Sortie;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ParticipantRepository")
 * @UniqueEntity(
 *  fields={"mail"},
 *  message="Email déjà utilisé !"
 * )
 */
class Participant implements UserInterface
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
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Email()
     */
    private $mail;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\EqualTo(propertyPath="confirm_password", message="Confirm_password muste be equal to Password")
     */
    private $password;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $admin = 0;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $actif = 1;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Campus", inversedBy="participants")
     * @ORM\JoinColumn(nullable=true)
     */
    private $idCampus;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Sortie", mappedBy="idOrganisateur")
     */
    private $sorties;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Sortie", mappedBy="dateInscription")
     */
    private $sortiesParticipants;

    /**
     * @Assert\EqualTo(propertyPath="password", message="Password muste be equal to Confirm_password")
     */
    private $confirm_password;
    public function getConfirmPassword(): ?string
    {
        return $this->confirm_password;
    }

    public function setConfirmPassword(string $confirm_password): self
    {
        $this->confirm_password = $confirm_password;

        return $this;
    }

    public function __construct()
    {
        $this->sorties = new ArrayCollection();
        $this->sortiesParticipants = new ArrayCollection();
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): self
    {
        $this->telephone = $telephone;

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

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getAdmin(): ?bool
    {
        return $this->admin;
    }

    public function setAdmin(?bool $admin): self
    {
        $this->admin = $admin;

        return $this;
    }

    public function getActif(): ?bool
    {
        return $this->actif;
    }

    public function setActif(?bool $actif): self
    {
        $this->actif = $actif;

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

    /**
     * @return Collection|Sortie[]
     */
    public function getSorties(): Collection
    {
        return $this->sorties;
    }

    public function addSorty(Sortie $sorty): self
    {
        if (!$this->sorties->contains($sorty)) {
            $this->sorties[] = $sorty;
            $sorty->setIdOrganisateur($this);
        }

        return $this;
    }

    public function removeSorty(Sortie $sorty): self
    {
        if ($this->sorties->contains($sorty)) {
            $this->sorties->removeElement($sorty);
            // set the owning side to null (unless already changed)
            if ($sorty->getIdOrganisateur() === $this) {
                $sorty->setIdOrganisateur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Sortie[]
     */
    public function getSortiesParticipants(): Collection
    {
        return $this->sortiesParticipants;
    }

    public function addSortiesParticipant(Sortie $sortiesParticipant): self
    {
        if (!$this->sortiesParticipants->contains($sortiesParticipant)) {
            $this->sortiesParticipants[] = $sortiesParticipant;
            $sortiesParticipant->addDateInscription($this);
        }

        return $this;
    }

    public function removeSortiesParticipant(Sortie $sortiesParticipant): self
    {
        if ($this->sortiesParticipants->contains($sortiesParticipant)) {
            $this->sortiesParticipants->removeElement($sortiesParticipant);
            $sortiesParticipant->removeDateInscription($this);
        }

        return $this;
    }

    public function getUsername(){
        return $this->mail;
    }

    public function getRoles(){
        return ['ROLE_USER'];
    }

    public function getSalt(){

    }
    public function erasecredentials(){

    }
}

