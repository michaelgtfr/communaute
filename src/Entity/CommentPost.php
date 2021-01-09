<?php

namespace App\Entity;

use App\Entity\AbstractEntity\AbstractComment;
use App\Repository\CommentPostRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    /**
     * @ORM\OneToMany(targetEntity=NoteCommentPost::class, mappedBy="commentPostId")
     */
    private $noteCommentPostId;

    public function __construct()
    {
        $this->noteCommentPostId = new ArrayCollection();
    }

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

    /**
     * @return Collection|NoteCommentPost[]
     */
    public function getNoteCommentPostId(): Collection
    {
        return $this->noteCommentPostId;
    }

    public function addNoteCommentPostId(NoteCommentPost $noteCommentPostId): self
    {
        if (!$this->noteCommentPostId->contains($noteCommentPostId)) {
            $this->noteCommentPostId[] = $noteCommentPostId;
            $noteCommentPostId->setCommentPostId($this);
        }

        return $this;
    }

    public function removeNoteCommentPostId(NoteCommentPost $noteCommentPostId): self
    {
        if ($this->noteCommentPostId->removeElement($noteCommentPostId)) {
            // set the owning side to null (unless already changed)
            if ($noteCommentPostId->getCommentPostId() === $this) {
                $noteCommentPostId->setCommentPostId(null);
            }
        }

        return $this;
    }
}
