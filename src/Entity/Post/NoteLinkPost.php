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
     * @ORM\ManyToOne(targetEntity=LinkPost::class, inversedBy="noteLinkPosts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $linkPosts;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLinkPosts(): ?LinkPost
    {
        return $this->linkPosts;
    }

    public function setLinkPosts(?LinkPost $linkPosts): self
    {
        $this->linkPosts = $linkPosts;

        return $this;
    }
}
