<?php

namespace App\Entity;

use App\Repository\NoLimitRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=NoLimitRepository::class)
 */
class NoLimit
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateCreate;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="noLimitId")
     */
    private $userId;

    /**
     * @ORM\OneToOne(targetEntity=CommentNoLimit::class, inversedBy="noLimitId", cascade={"persist", "remove"})
     */
    private $commentNoLimit;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateCreate(): ?\DateTimeInterface
    {
        return $this->dateCreate;
    }

    public function setDateCreate(\DateTimeInterface $dateCreate): self
    {
        $this->dateCreate = $dateCreate;

        return $this;
    }

    public function getUserId(): ?User
    {
        return $this->userId;
    }

    public function setUserId(?User $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    public function getCommentNoLimit(): ?CommentNoLimit
    {
        return $this->commentNoLimit;
    }

    public function setCommentNoLimit(?CommentNoLimit $commentNoLimit): self
    {
        $this->commentNoLimit = $commentNoLimit;

        return $this;
    }
}
