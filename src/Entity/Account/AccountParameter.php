<?php

namespace App\Entity\Account;

use App\Repository\Account\AccountParameterRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AccountParameterRepository::class)
 */
class AccountParameter
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
    private $choicePubs = [];

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $choiceNews = [];

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $choiceParameter = [];

    /**
     * @ORM\OneToOne(targetEntity=User::class, mappedBy="accountParameters", cascade={"persist", "remove"})
     */
    private $users;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getChoicePubs(): ?array
    {
        return $this->choicePubs;
    }

    public function setChoicePubs(?array $choicePubs): self
    {
        $this->choicePubs = $choicePubs;

        return $this;
    }

    public function getChoiceNews(): ?array
    {
        return $this->choiceNews;
    }

    public function setChoiceNews(?array $choiceNews): self
    {
        $this->choiceNews = $choiceNews;

        return $this;
    }

    public function getChoiceParameter(): ?array
    {
        return $this->choiceParameter;
    }

    public function setChoiceParameter(?array $choiceParameter): self
    {
        $this->choiceParameter = $choiceParameter;

        return $this;
    }

    public function getUsers(): ?User
    {
        return $this->users;
    }

    public function setUsers(User $users): self
    {
        // set the owning side of the relation if necessary
        if ($users->getAccountParameters() !== $this) {
            $users->setAccountParameters($this);
        }

        $this->users = $users;

        return $this;
    }
}
