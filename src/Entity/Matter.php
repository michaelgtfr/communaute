<?php

namespace App\Entity;

use App\Repository\MatterRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MatterRepository::class)
 */
class Matter
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $matter;

    /**
     * @ORM\Column(type="date")
     */
    private $dateMatter;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMatter(): ?string
    {
        return $this->matter;
    }

    public function setMatter(string $matter): self
    {
        $this->matter = $matter;

        return $this;
    }

    public function getDateMatter(): ?\DateTimeInterface
    {
        return $this->dateMatter;
    }

    public function setDateMatter(\DateTimeInterface $dateMatter): self
    {
        $this->dateMatter = $dateMatter;

        return $this;
    }
}
