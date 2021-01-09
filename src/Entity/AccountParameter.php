<?php

namespace App\Entity;

use App\Repository\AccountParameterRepository;
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
     * @ORM\OneToOne(targetEntity=User::class, mappedBy="accountParameterId", cascade={"persist", "remove"})
     */
    private $userId;

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

    public function getUserId(): ?User
    {
        return $this->userId;
    }

    public function setUserId(User $userId): self
    {
        // set the owning side of the relation if necessary
        if ($userId->getAccountParameterId() !== $this) {
            $userId->setAccountParameterId($this);
        }

        $this->userId = $userId;

        return $this;
    }
}
