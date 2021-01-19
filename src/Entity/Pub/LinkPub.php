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
