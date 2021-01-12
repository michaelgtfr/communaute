<?php

namespace App\Entity;

use App\Repository\ResultingRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ResultingRepository::class)
 */
class Resulting
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="integer")
     */
    private $numberConnection;

    /**
     * @ORM\Column(type="integer")
     */
    private $numberPubAdded;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getNumberConnection(): ?int
    {
        return $this->numberConnection;
    }

    public function setNumberConnection(int $numberConnection): self
    {
        $this->numberConnection = $numberConnection;

        return $this;
    }

    public function getNumberPubAdded(): ?int
    {
        return $this->numberPubAdded;
    }

    public function setNumberPubAdded(int $numberPubAdded): self
    {
        $this->numberPubAdded = $numberPubAdded;

        return $this;
    }
}
