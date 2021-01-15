<?php

namespace App\Entity\Post;

use App\Entity\AbstractEntity\AbstractNotePost;
use App\Repository\Post\NoteLinkPostRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=NoteLinkPostRepository::class)
 */
class NoteLinkPost extends AbstractNotePost
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=LinkPost::class, inversedBy="noteLinkPostId")
     * @ORM\JoinColumn(nullable=false)
     */
    private $linkPostId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLinkPostId(): ?LinkPost
    {
        return $this->linkPostId;
    }

    public function setLinkPostId(?LinkPost $linkPostId): self
    {
        $this->linkPostId = $linkPostId;

        return $this;
    }
}