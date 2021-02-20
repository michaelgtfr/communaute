<?php

namespace App\Entity\Post;

use App\Entity\Account\User;
use App\Repository\Post\PostRepository;
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
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="posts")
     * @ORM\JoinColumn(nullable=true)
     */
    private $users;

    /**
     * @ORM\OneToOne(targetEntity=CommentPost::class, inversedBy="posts", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $commentPost;

    /**
     * @ORM\OneToOne(targetEntity=LinkPost::class, inversedBy="posts", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $linkPost;

    /**
     * @ORM\OneToOne(targetEntity=PicturePost::class, inversedBy="posts", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $picturePost;

    /**
     * @ORM\OneToOne(targetEntity=VideoPost::class, inversedBy="posts", cascade={"persist", "remove"})
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

    public function getUsers(): ?User
    {
        return $this->users;
    }

    public function setUsers(?User $users): self
    {
        $this->users = $users;

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
