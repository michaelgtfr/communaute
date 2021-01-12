<?php

namespace App\Entity\Pub;

use App\Entity\AbstractEntity\AbstractComment;
use App\Repository\Pub\CommentPubRepository;
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

    /**
     * @ORM\ManyToOne(targetEntity=Publicity::class, inversedBy="commentPub")
     * @ORM\JoinColumn(nullable=false)
     */
    private $publicityId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPublicityId(): ?Publicity
    {
        return $this->publicityId;
    }

    public function setPublicityId(?Publicity $publicityId): self
    {
        $this->publicityId = $publicityId;

        return $this;
    }
}
