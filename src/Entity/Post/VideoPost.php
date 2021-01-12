<?php

namespace App\Entity\Post;

use App\Entity\AbstractEntity\AbstractFiles;
use App\Repository\Post\VideoPostRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VideoPostRepository::class)
 */
class VideoPost extends AbstractFiles
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=Post::class, mappedBy="videoPost", cascade={"persist", "remove"})
     */
    private $postId;

    /**
     * @ORM\OneToMany(targetEntity=NoteVideoPost::class, mappedBy="videoPostId")
     * @ORM\JoinColumn(nullable=true)
     */
    private $noteVideoPostId;

    public function __construct()
    {
        $this->noteVideoPostId = new ArrayCollection();
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
            $this->postId->setVideoPost(null);
        }

        // set the owning side of the relation if necessary
        if ($postId !== null && $postId->getVideoPost() !== $this) {
            $postId->setVideoPost($this);
        }

        $this->postId = $postId;

        return $this;
    }

    /**
     * @return Collection|NoteVideoPost[]
     */
    public function getNoteVideoPostId(): Collection
    {
        return $this->noteVideoPostId;
    }

    public function addNoteVideoPostId(NoteVideoPost $noteVideoPostId): self
    {
        if (!$this->noteVideoPostId->contains($noteVideoPostId)) {
            $this->noteVideoPostId[] = $noteVideoPostId;
            $noteVideoPostId->setVideoPostId($this);
        }

        return $this;
    }

    public function removeNoteVideoPostId(NoteVideoPost $noteVideoPostId): self
    {
        if ($this->noteVideoPostId->removeElement($noteVideoPostId)) {
            // set the owning side to null (unless already changed)
            if ($noteVideoPostId->getVideoPostId() === $this) {
                $noteVideoPostId->setVideoPostId(null);
            }
        }

        return $this;
    }
}
