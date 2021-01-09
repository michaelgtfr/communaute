<?php

namespace App\Entity;

use App\Entity\AbstractEntity\AbstractFiles;
use App\Repository\VideoPubRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VideoPubRepository::class)
 */
class VideoPub extends AbstractFiles
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Publicity::class, inversedBy="videoPub")
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
