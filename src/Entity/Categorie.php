<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Repository\CategorieRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=CategorieRepository::class)
 */
class Categorie
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"categorie:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=70)
     * @Groups({"categorie:read"})
     */
    private $nom;

    /**
     * @ORM\OneToMany(targetEntity=SousCategorie::class, mappedBy="categorie")
     */
    private $sousCategories;

    public function __construct()
    {
        $this->sousCategories = new ArrayCollection();
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

    /**
     * @return Collection|SousCategorie[]
     */
    public function getSousCategories(): Collection
    {
        return $this->sousCategories;
    }

    public function addSousCategory(SousCategorie $sousCategory): self
    {
        if (!$this->sousCategories->contains($sousCategory)) {
            $this->sousCategories[] = $sousCategory;
            $sousCategory->setCategorie($this);
        }

        return $this;
    }

    public function removeSousCategory(SousCategorie $sousCategory): self
    {
        if ($this->sousCategories->removeElement($sousCategory)) {
            // set the owning side to null (unless already changed)
            if ($sousCategory->getCategorie() === $this) {
                $sousCategory->setCategorie(null);
            }
        }

        return $this;
    }
}
