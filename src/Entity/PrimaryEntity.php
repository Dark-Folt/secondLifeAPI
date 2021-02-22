<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PrimaryEntityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PrimaryEntityRepository::class)
 * @ApiResource()
 */
// #[ApiRessource]
class PrimaryEntity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
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
     * @ORM\OneToMany(targetEntity=TestEntity::class, mappedBy="primaryEntity", orphanRemoval=true)
     */
    private $testEntity;

    public function __construct()
    {
        $this->testEntity = new ArrayCollection();
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

    /**
     * @return Collection|TestEntity[]
     */
    public function getTestEntity(): Collection
    {
        return $this->testEntity;
    }

    public function addTestEntity(TestEntity $testEntity): self
    {
        if (!$this->testEntity->contains($testEntity)) {
            $this->testEntity[] = $testEntity;
            $testEntity->setPrimaryEntity($this);
        }

        return $this;
    }

    public function removeTestEntity(TestEntity $testEntity): self
    {
        if ($this->testEntity->removeElement($testEntity)) {
            // set the owning side to null (unless already changed)
            if ($testEntity->getPrimaryEntity() === $this) {
                $testEntity->setPrimaryEntity(null);
            }
        }

        return $this;
    }
}
