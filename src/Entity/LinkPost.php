<?php

namespace App\Entity;

use App\Entity\AbstractEntity\AbstractLink;
use App\Repository\LinkPostRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LinkPostRepository::class)
 */
class LinkPost extends AbstractLink
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=Post::class, mappedBy="linkPost", cascade={"persist", "remove"})
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
            $this->postId->setLinkPost(null);
        }

        // set the owning side of the relation if necessary
        if ($postId !== null && $postId->getLinkPost() !== $this) {
            $postId->setLinkPost($this);
        }

        $this->postId = $postId;

        return $this;
    }
}
