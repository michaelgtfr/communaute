<?php

namespace App\Entity;

use App\Entity\AbstractEntity\AbstractComment;
use App\Repository\CommentPubRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommentPubRepository::class)
 */
class CommentPub extends AbstractComment
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
