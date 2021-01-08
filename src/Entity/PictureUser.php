<?php

namespace App\Entity;

use App\Repository\PictureUserRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PictureUserRepository::class)
 */
class PictureUser
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $profilPicture;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getProfilPicture(): ?bool
    {
        return $this->profilPicture;
    }

    public function setProfilPicture(?bool $profilPicture): self
    {
        $this->profilPicture = $profilPicture;

        return $this;
    }
}
