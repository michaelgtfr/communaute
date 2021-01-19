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
    private $posts;

    /**
     * @ORM\OneToMany(targetEntity=NoteVideoPost::class, mappedBy="videoPosts")
     * @ORM\JoinColumn(nullable=true)
     */
    private $noteVideoPosts;

    public function __construct()
    {
        $this->noteVideoPosts = new ArrayCollection();
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
            $this->posts->setVideoPost(null);
        }

        // set the owning side of the relation if necessary
        if ($posts !== null && $posts->getVideoPost() !== $this) {
            $posts->setVideoPost($this);
        }

        $this->posts = $posts;

        return $this;
    }

    /**
     * @return Collection|NoteVideoPost[]
     */
    public function getNoteVideoPosts(): Collection
    {
        return $this->noteVideoPosts;
    }

    public function addNoteVideoPosts(NoteVideoPost $noteVideoPosts): self
    {
        if (!$this->noteVideoPosts->contains($noteVideoPosts)) {
            $this->noteVideoPosts[] = $noteVideoPosts;
            $noteVideoPosts->setVideoPosts($this);
        }

        return $this;
    }

    public function removeNoteVideoPosts(NoteVideoPost $noteVideoPosts): self
    {
        if ($this->noteVideoPosts->removeElement($noteVideoPosts)) {
            // set the owning side to null (unless already changed)
            if ($noteVideoPosts->getVideoPosts() === $this) {
                $noteVideoPosts->setVideoPosts(null);
            }
        }

        return $this;
    }
}
