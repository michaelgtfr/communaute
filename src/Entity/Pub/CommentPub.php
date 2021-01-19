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
    private $publicitys;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPublicitys(): ?Publicity
    {
        return $this->publicitys;
    }

    public function setPublicitys(?Publicity $publicitys): self
    {
        $this->publicitys = $publicitys;

        return $this;
    }
}
