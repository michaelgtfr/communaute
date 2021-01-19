<?php

namespace App\Entity\Post;

use App\Entity\AbstractEntity\AbstractNotePost;
use App\Repository\Post\NoteCommentPostRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=NoteCommentPostRepository::class)
 */
class NoteCommentPost extends AbstractNotePost
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=CommentPost::class, inversedBy="noteCommentPosts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $commentPosts;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCommentPosts(): ?CommentPost
    {
        return $this->commentPosts;
    }

    public function setCommentPosts(?CommentPost $commentPosts): self
    {
        $this->commentPosts = $commentPosts;

        return $this;
    }
}
