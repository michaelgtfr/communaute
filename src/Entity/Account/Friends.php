<?php

namespace App\Entity\Account;

use App\Repository\Account\FriendsRepository;
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

    /**
     * @ORM\OneToOne(targetEntity=User::class, mappedBy="friends", cascade={"persist", "remove"})
     */
    private $users;


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

    public function getUsers(): ?User
    {
        return $this->users;
    }

    public function setUsers(?User $users): self
    {
        // unset the owning side of the relation if necessary
        if ($users === null && $this->users !== null) {
            $this->users->setFriends(null);
        }

        // set the owning side of the relation if necessary
        if ($users !== null && $users->getFriends() !== $this) {
            $users->setFriends($this);
        }

        $this->users = $users;

        return $this;
    }
}
