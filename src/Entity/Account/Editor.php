<?php

namespace App\Entity\Account;

use App\Entity\AbstractEntity\AbstractAccountInformation;
use App\Entity\Pub\Publicity;
use App\Repository\Account\EditorRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EditorRepository::class)
 */
class Editor extends AbstractAccountInformation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $compagny;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $socialAddress;

    /**
     * @ORM\OneToMany(targetEntity=Publicity::class, mappedBy="editorId")
     */
    private $publicity;

    public function __construct()
    {
        $this->publicity = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCompagny(): ?string
    {
        return $this->compagny;
    }

    public function setCompagny(string $compagny): self
    {
        $this->compagny = $compagny;

        return $this;
    }

    public function getSocialAddress(): ?string
    {
        return $this->socialAddress;
    }

    public function setSocialAddress(string $socialAddress): self
    {
        $this->socialAddress = $socialAddress;

        return $this;
    }

    /**
     * @return Collection|Publicity[]
     */
    public function getPublicity(): Collection
    {
        return $this->publicity;
    }

    public function addPublicity(Publicity $publicity): self
    {
        if (!$this->publicity->contains($publicity)) {
            $this->publicity[] = $publicity;
            $publicity->setEditorId($this);
        }

        return $this;
    }

    public function removePublicity(Publicity $publicity): self
    {
        if ($this->publicity->removeElement($publicity)) {
            // set the owning side to null (unless already changed)
            if ($publicity->getEditorId() === $this) {
                $publicity->setEditorId(null);
            }
        }

        return $this;
    }
}
