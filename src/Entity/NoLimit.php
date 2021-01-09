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

    /**
     * @ORM\OneToOne(targetEntity=LinkNoLimit::class, inversedBy="noLimitId", cascade={"persist", "remove"})
     */
    private $linkNoLimit;

    /**
     * @ORM\OneToOne(targetEntity=VideoNoLimit::class, inversedBy="noLimitId", cascade={"persist", "remove"})
     */
    private $videoNoLimit;

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

    public function getLinkNoLimit(): ?LinkNoLimit
    {
        return $this->linkNoLimit;
    }

    public function setLinkNoLimit(?LinkNoLimit $linkNoLimit): self
    {
        $this->linkNoLimit = $linkNoLimit;

        return $this;
    }

    public function getVideoNoLimit(): ?VideoNoLimit
    {
        return $this->videoNoLimit;
    }

    public function setVideoNoLimit(?VideoNoLimit $videoNoLimit): self
    {
        $this->videoNoLimit = $videoNoLimit;

        return $this;
    }
}
