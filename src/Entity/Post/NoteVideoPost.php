<?php

namespace App\Entity\Post;

use App\Entity\AbstractEntity\AbstractNotePost;
use App\Repository\Post\NoteVideoPostRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=NoteVideoPostRepository::class)
 */
class NoteVideoPost extends AbstractNotePost
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=VideoPost::class, inversedBy="noteVideoPostId")
     * @ORM\JoinColumn(nullable=false)
     */
    private $videoPostId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVideoPostId(): ?VideoPost
    {
        return $this->videoPostId;
    }

    public function setVideoPostId(?VideoPost $videoPostId): self
    {
        $this->videoPostId = $videoPostId;

        return $this;
    }
}
