<?php

namespace App\Entity;

use App\Repository\FriendsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FriendsRepository::class)
 */
class Friends
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $friendsId = [];

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $friendRequest = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFriendsId(): ?array
    {
        return $this->friendsId;
    }

    public function setFriendsId(?array $friendsId): self
    {
        $this->friendsId = $friendsId;

        return $this;
    }

    public function getFriendRequest(): ?array
    {
        return $this->friendRequest;
    }

    public function setFriendRequest(?array $friendRequest): self
    {
        $this->friendRequest = $friendRequest;

        return $this;
    }
}
