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
    private $videoPosts;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVideoPosts(): ?VideoPost
    {
        return $this->videoPosts;
    }

    public function setVideoPosts(?VideoPost $videoPosts): self
    {
        $this->videoPosts = $videoPosts;

        return $this;
    }
}
