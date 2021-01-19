<?php

namespace App\Entity\Post;

use App\Entity\AbstractEntity\AbstractLink;
use App\Repository\Post\LinkPostRepository;
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
    private $posts;

    /**
     * @ORM\OneToMany(targetEntity=NoteLinkPost::class, mappedBy="linkPosts")
     * @ORM\JoinColumn(nullable=true)
     */
    private $noteLinkPosts;

    public function __construct()
    {
        $this->noteLinkPosts = new ArrayCollection();
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
            $this->posts->setLinkPost(null);
        }

        // set the owning side of the relation if necessary
        if ($posts !== null && $posts->getLinkPost() !== $this) {
            $posts->setLinkPost($this);
        }

        $this->posts = $posts;

        return $this;
    }

    /**
     * @return Collection|NoteLinkPost[]
     */
    public function getNoteLinkPosts(): Collection
    {
        return $this->noteLinkPosts;
    }

    public function addNoteLinkPosts(NoteLinkPost $noteLinkPosts): self
    {
        if (!$this->noteLinkPosts->contains($noteLinkPosts)) {
            $this->noteLinkPosts[] = $noteLinkPosts;
            $noteLinkPosts->setLinkPosts($this);
        }

        return $this;
    }

    public function removeNoteLinkPosts(NoteLinkPost $noteLinkPosts): self
    {
        if ($this->noteLinkPosts->removeElement($noteLinkPosts)) {
            // set the owning side to null (unless already changed)
            if ($noteLinkPosts->getLinkPosts() === $this) {
                $noteLinkPosts->setLinkPosts(null);
            }
        }

        return $this;
    }
}
