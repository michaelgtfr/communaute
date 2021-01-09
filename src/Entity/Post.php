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
     */
    private $userId;

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
}
