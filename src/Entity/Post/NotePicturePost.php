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
     * @ORM\ManyToOne(targetEntity=PicturePost::class, inversedBy="notePicturePostId")
     * @ORM\JoinColumn(nullable=false)
     */
    private $picturePostId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPicturePostId(): ?PicturePost
    {
        return $this->picturePostId;
    }

    public function setPicturePostId(?PicturePost $picturePostId): self
    {
        $this->picturePostId = $picturePostId;

        return $this;
    }
}
