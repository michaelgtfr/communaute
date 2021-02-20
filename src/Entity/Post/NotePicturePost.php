<?php

namespace App\Entity\Post;

use App\Entity\AbstractEntity\AbstractNotePost;
use App\Repository\Post\NotePicturePostRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=NotePicturePostRepository::class)
 */
class NotePicturePost extends AbstractNotePost
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=PicturePost::class, inversedBy="notePicturePosts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $picturePosts;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPicturePosts(): ?PicturePost
    {
        return $this->picturePosts;
    }

    public function setPicturePosts(?PicturePost $picturePosts): self
    {
        $this->picturePosts = $picturePosts;

        return $this;
    }
}
