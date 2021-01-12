<?php

namespace App\Entity\Post;

use App\Entity\AbstractEntity\AbstractFiles;
use App\Repository\Post\PicturePostRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PicturePostRepository::class)
 */
class PicturePost extends AbstractFiles
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=Post::class, mappedBy="picturePost", cascade={"persist", "remove"})
     */
    private $postId;

    /**
     * @ORM\OneToMany(targetEntity=NotePicturePost::class, mappedBy="picturePostId")
     * @ORM\JoinColumn(nullable=true)
     */
    private $notePicturePostId;

    public function __construct()
    {
        $this->notePicturePostId = new ArrayCollection();
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
            $this->postId->setPicturePost(null);
        }

        // set the owning side of the relation if necessary
        if ($postId !== null && $postId->getPicturePost() !== $this) {
            $postId->setPicturePost($this);
        }

        $this->postId = $postId;

        return $this;
    }

    /**
     * @return Collection|NotePicturePost[]
     */
    public function getNotePicturePostId(): Collection
    {
        return $this->notePicturePostId;
    }

    public function addNotePicturePostId(NotePicturePost $notePicturePostId): self
    {
        if (!$this->notePicturePostId->contains($notePicturePostId)) {
            $this->notePicturePostId[] = $notePicturePostId;
            $notePicturePostId->setPicturePostId($this);
        }

        return $this;
    }

    public function removeNotePicturePostId(NotePicturePost $notePicturePostId): self
    {
        if ($this->notePicturePostId->removeElement($notePicturePostId)) {
            // set the owning side to null (unless already changed)
            if ($notePicturePostId->getPicturePostId() === $this) {
                $notePicturePostId->setPicturePostId(null);
            }
        }

        return $this;
    }
}
