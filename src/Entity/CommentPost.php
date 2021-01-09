<?php

namespace App\Entity;

use App\Entity\AbstractEntity\AbstractComment;
use App\Repository\CommentPostRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommentPostRepository::class)
 */
class CommentPost extends AbstractComment
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=Post::class, mappedBy="commentPost", cascade={"persist", "remove"})
     */
    private $postId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPostId(): ?Post
    {
        return $this->postId;
    }

    public function setPostId(?Post $postId): self
    {
        // unset the owning side of the relation if necessary
        if ($postId === null && $this->postId !== null) {
            $this->postId->setCommentPost(null);
        }

        // set the owning side of the relation if necessary
        if ($postId !== null && $postId->getCommentPost() !== $this) {
            $postId->setCommentPost($this);
        }

        $this->postId = $postId;

        return $this;
    }
}
