<?php

namespace App\Entity;

use App\Entity\AbstractEntity\AbstractFiles;
use App\Repository\PicturePostRepository;
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
}
