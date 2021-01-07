<?php

namespace App\Entity;

use App\Entity\AbstractEntity\AbstractAccountInformation;
use App\Repository\EditorRepository;
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
}
