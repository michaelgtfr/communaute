<?php

namespace App\Entity;

use App\Entity\AbstractEntity\AbstractNotePost;
use App\Repository\NoteCommentPostRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=NoteCommentPostRepository::class)
 */
class NoteCommentPost extends AbstractNotePost
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    public function getId(): ?int
    {
        return $this->id;
    }
}