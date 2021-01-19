<?php

namespace App\Entity\Account;

use App\Entity\AbstractEntity\AbstractFiles;
use App\Repository\Account\PictureUserRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PictureUserRepository::class)
 */
class PictureUser extends AbstractFiles
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

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="pictureUsers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $users;

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

    public function getUsers(): ?User
    {
        return $this->users;
    }

    public function setUsers(?User $users): self
    {
        $this->users = $users;

        return $this;
    }
}
