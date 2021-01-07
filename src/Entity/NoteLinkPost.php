<?php

namespace App\Entity;

use App\Entity\AbstractEntity\AbstractNotePost;
use App\Repository\NoteLinkPostRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=NoteLinkPostRepository::class)
 */
class NoteLinkPost extends AbstractNotePost
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
