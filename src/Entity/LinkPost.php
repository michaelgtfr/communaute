<?php

namespace App\Entity;

use App\Entity\AbstractEntity\AbstractLink;
use App\Repository\LinkPostRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    /**
     * @ORM\OneToMany(targetEntity=NoteLinkPost::class, mappedBy="linkPostId")
     * @ORM\JoinColumn(nullable=true)
     */
    private $noteLinkPostId;

    public function __construct()
    {
        $this->noteLinkPostId = new ArrayCollection();
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
            $this->postId->setLinkPost(null);
        }

        // set the owning side of the relation if necessary
        if ($postId !== null && $postId->getLinkPost() !== $this) {
            $postId->setLinkPost($this);
        }

        $this->postId = $postId;

        return $this;
    }

    /**
     * @return Collection|NoteLinkPost[]
     */
    public function getNoteLinkPostId(): Collection
    {
        return $this->noteLinkPostId;
    }

    public function addNoteLinkPostId(NoteLinkPost $noteLinkPostId): self
    {
        if (!$this->noteLinkPostId->contains($noteLinkPostId)) {
            $this->noteLinkPostId[] = $noteLinkPostId;
            $noteLinkPostId->setLinkPostId($this);
        }

        return $this;
    }

    public function removeNoteLinkPostId(NoteLinkPost $noteLinkPostId): self
    {
        if ($this->noteLinkPostId->removeElement($noteLinkPostId)) {
            // set the owning side to null (unless already changed)
            if ($noteLinkPostId->getLinkPostId() === $this) {
                $noteLinkPostId->setLinkPostId(null);
            }
        }

        return $this;
    }
}
