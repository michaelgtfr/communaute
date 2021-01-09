<?php

namespace App\Entity;

use App\Repository\PostRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PostRepository::class)
 */
class Post
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
    private $dateTimePost;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $likePost = [];

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="postId")
     * @ORM\JoinColumn(nullable=true)
     */
    private $userId;

    /**
     * @ORM\OneToOne(targetEntity=CommentPost::class, inversedBy="postId", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $commentPost;

    /**
     * @ORM\OneToOne(targetEntity=LinkPost::class, inversedBy="postId", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $linkPost;

    /**
     * @ORM\OneToOne(targetEntity=PicturePost::class, inversedBy="postId", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $picturePost;

    /**
     * @ORM\OneToOne(targetEntity=VideoPost::class, inversedBy="postId", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $videoPost;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateTimePost(): ?\DateTimeInterface
    {
        return $this->dateTimePost;
    }

    public function setDateTimePost(\DateTimeInterface $dateTimePost): self
    {
        $this->dateTimePost = $dateTimePost;

        return $this;
    }

    public function getLikePost(): ?array
    {
        return $this->likePost;
    }

    public function setLikePost(?array $likePost): self
    {
        $this->likePost = $likePost;

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

    public function getCommentPost(): ?CommentPost
    {
        return $this->commentPost;
    }

    public function setCommentPost(?CommentPost $commentPost): self
    {
        $this->commentPost = $commentPost;

        return $this;
    }

    public function getLinkPost(): ?LinkPost
    {
        return $this->linkPost;
    }

    public function setLinkPost(?LinkPost $linkPost): self
    {
        $this->linkPost = $linkPost;

        return $this;
    }

    public function getPicturePost(): ?PicturePost
    {
        return $this->picturePost;
    }

    public function setPicturePost(?PicturePost $picturePost): self
    {
        $this->picturePost = $picturePost;

        return $this;
    }

    public function getVideoPost(): ?VideoPost
    {
        return $this->videoPost;
    }

    public function setVideoPost(?VideoPost $videoPost): self
    {
        $this->videoPost = $videoPost;

        return $this;
    }
}
