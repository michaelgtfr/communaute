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
     * @ORM\ManyToOne(targetEntity=CommentPost::class, inversedBy="noteCommentPostId")
     * @ORM\JoinColumn(nullable=false)
     */
    private $commentPostId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCommentPostId(): ?CommentPost
    {
        return $this->commentPostId;
    }

    public function setCommentPostId(?CommentPost $commentPostId): self
    {
        $this->commentPostId = $commentPostId;

        return $this;
    }
}
