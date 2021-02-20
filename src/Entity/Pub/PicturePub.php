<?php

namespace App\Entity\Pub;

use App\Entity\AbstractEntity\AbstractFiles;
use App\Repository\Pub\PicturePubRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PicturePubRepository::class)
 */
class PicturePub extends AbstractFiles
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Publicity::class, inversedBy="picturePub")
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
