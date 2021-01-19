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
    private $posts;

    /**
     * @ORM\OneToMany(targetEntity=NotePicturePost::class, mappedBy="picturePosts")
     * @ORM\JoinColumn(nullable=true)
     */
    private $notePicturePosts;

    public function __construct()
    {
        $this->notePicturePosts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPosts(): ?Post
    {
        return $this->posts;
    }

    public function setPostId(?Post $posts): self
    {
        // unset the owning side of the relation if necessary
        if ($posts === null && $this->posts !== null) {
            $this->posts->setPicturePost(null);
        }

        // set the owning side of the relation if necessary
        if ($posts !== null && $posts->getPicturePost() !== $this) {
            $posts->setPicturePost($this);
        }

        $this->posts = $posts;

        return $this;
    }

    /**
     * @return Collection|NotePicturePost[]
     */
    public function getNotePicturePosts(): Collection
    {
        return $this->notePicturePosts;
    }

    public function addNotePicturePosts(NotePicturePost $notePicturePosts): self
    {
        if (!$this->notePicturePosts->contains($notePicturePosts)) {
            $this->notePicturePosts[] = $notePicturePosts;
            $notePicturePosts->setPicturePosts($this);
        }

        return $this;
    }

    public function removeNotePicturePosts(NotePicturePost $notePicturePosts): self
    {
        if ($this->notePicturePosts->removeElement($notePicturePosts)) {
            // set the owning side to null (unless already changed)
            if ($notePicturePosts->getPicturePosts() === $this) {
                $notePicturePosts->setPicturePosts(null);
            }
        }

        return $this;
    }
}
