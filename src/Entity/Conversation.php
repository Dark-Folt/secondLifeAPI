<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ConversationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=ConversationRepository::class)
 */
class Conversation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity=Utilisateur::class, inversedBy="conversations")
     */
    private $expediteur;

    /**
     * @ORM\ManyToMany(targetEntity=Utilisateur::class, inversedBy="conversations")
     */
    private $destinataire;

    public function __construct()
    {
        $this->expediteur = new ArrayCollection();
        $this->destinataire = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Utilisateur[]
     */
    public function getExpediteur(): Collection
    {
        return $this->expediteur;
    }

    public function addExpediteur(Utilisateur $expediteur): self
    {
        if (!$this->expediteur->contains($expediteur)) {
            $this->expediteur[] = $expediteur;
        }

        return $this;
    }

    public function removeExpediteur(Utilisateur $expediteur): self
    {
        $this->expediteur->removeElement($expediteur);

        return $this;
    }

    /**
     * @return Collection|Utilisateur[]
     */
    public function getDestinataire(): Collection
    {
        return $this->destinataire;
    }

    public function addDestinataire(Utilisateur $destinataire): self
    {
        if (!$this->destinataire->contains($destinataire)) {
            $this->destinataire[] = $destinataire;
        }

        return $this;
    }

    public function removeDestinataire(Utilisateur $destinataire): self
    {
        $this->destinataire->removeElement($destinataire);

        return $this;
    }
}
