<?php

namespace App\Entity\Post;

use App\Entity\AbstractEntity\AbstractComment;
use App\Repository\Post\CommentPostRepository;
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
    private $posts;

    /**
     * @ORM\OneToMany(targetEntity=NoteCommentPost::class, mappedBy="commentPosts")
     * @ORM\JoinColumn(nullable=true)
     */
    private $noteCommentPosts;

    public function __construct()
    {
        $this->noteCommentPosts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPosts(): ?Post
    {
        return $this->posts;
    }

    public function setPosts(?Post $posts): self
    {
        // unset the owning side of the relation if necessary
        if ($posts === null && $this->posts !== null) {
            $this->posts->setCommentPost(null);
        }

        // set the owning side of the relation if necessary
        if ($posts !== null && $posts->getCommentPost() !== $this) {
            $posts->setCommentPost($this);
        }

        $this->posts = $posts;

        return $this;
    }

    /**
     * @return Collection|NoteCommentPost[]
     */
    public function getNoteCommentPosts(): Collection
    {
        return $this->noteCommentPosts;
    }

    public function addNoteCommentPosts(NoteCommentPost $noteCommentPosts): self
    {
        if (!$this->noteCommentPosts->contains($noteCommentPosts)) {
            $this->noteCommentPosts[] = $noteCommentPosts;
            $noteCommentPosts->setCommentPosts($this);
        }

        return $this;
    }

    public function removeNoteCommentPosts(NoteCommentPost $noteCommentPosts): self
    {
        if ($this->noteCommentPosts->removeElement($noteCommentPosts)) {
            // set the owning side to null (unless already changed)
            if ($noteCommentPosts->getCommentPosts() === $this) {
                $noteCommentPosts->setCommentPosts(null);
            }
        }

        return $this;
    }
}
