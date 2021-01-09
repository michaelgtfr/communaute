<?php

namespace App\Entity;

use App\Repository\DiscussionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DiscussionRepository::class)
 */
class Discussion
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
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="discussionId")
     */
    private $userId;

    /**
     * @ORM\OneToOne(targetEntity=CommentDiscussion::class, inversedBy="discussionId", cascade={"persist", "remove"})
     */
    private $commentDiscussion;

    /**
     * @ORM\OneToOne(targetEntity=LinkDiscussion::class, inversedBy="discussionId", cascade={"persist", "remove"})
     */
    private $linkDiscussion;

    /**
     * @ORM\OneToOne(targetEntity=VideoDiscussion::class, inversedBy="discussionId", cascade={"persist", "remove"})
     */
    private $videoDiscussion;

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

    public function getCommentDiscussion(): ?CommentDiscussion
    {
        return $this->commentDiscussion;
    }

    public function setCommentDiscussion(?CommentDiscussion $commentDiscussion): self
    {
        $this->commentDiscussion = $commentDiscussion;

        return $this;
    }

    public function getLinkDiscussion(): ?LinkDiscussion
    {
        return $this->linkDiscussion;
    }

    public function setLinkDiscussion(?LinkDiscussion $linkDiscussion): self
    {
        $this->linkDiscussion = $linkDiscussion;

        return $this;
    }

    public function getVideoDiscussion(): ?VideoDiscussion
    {
        return $this->videoDiscussion;
    }

    public function setVideoDiscussion(?VideoDiscussion $videoDiscussion): self
    {
        $this->videoDiscussion = $videoDiscussion;

        return $this;
    }
}
