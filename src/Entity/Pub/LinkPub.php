<?php

namespace App\Entity\Pub;

use App\Entity\AbstractEntity\AbstractLink;
use App\Repository\Pub\LinkPubRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LinkPubRepository::class)
 */
class LinkPub extends AbstractLink
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Publicity::class, inversedBy="linkPub")
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
