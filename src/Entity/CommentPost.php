<?php

namespace App\Entity;

use App\Entity\AbstractEntity\AbstractComment;
use App\Repository\CommentPostRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommentPostRepository::class)
 */
class CommentPost extends AbstractComment
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
