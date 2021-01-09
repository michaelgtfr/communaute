<?php

namespace App\Entity;

use App\Entity\AbstractEntity\AbstractLink;
use App\Repository\LinkPubRepository;
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
    private $publicictyId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPublicictyId(): ?Publicity
    {
        return $this->publicictyId;
    }

    public function setPublicictyId(?Publicity $publicictyId): self
    {
        $this->publicictyId = $publicictyId;

        return $this;
    }
}
