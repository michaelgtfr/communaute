<?php

namespace App\Entity;

use App\Entity\AbstractEntity\AbstractComment;
use App\Repository\CommentDiscussionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommentDiscussionRepository::class)
 */
class CommentDiscussion extends AbstractComment
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
