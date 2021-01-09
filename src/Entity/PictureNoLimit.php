<?php

namespace App\Entity;

use App\Entity\AbstractEntity\AbstractFiles;
use App\Repository\PictureNoLimitRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PictureNoLimitRepository::class)
 */
class PictureNoLimit extends AbstractFiles
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=NoLimit::class, mappedBy="pictureNoLimit", cascade={"persist", "remove"})
     */
    private $noLimitId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNoLimitId(): ?NoLimit
    {
        return $this->noLimitId;
    }

    public function setNoLimitId(?NoLimit $noLimitId): self
    {
        // unset the owning side of the relation if necessary
        if ($noLimitId === null && $this->noLimitId !== null) {
            $this->noLimitId->setPictureNoLimit(null);
        }

        // set the owning side of the relation if necessary
        if ($noLimitId !== null && $noLimitId->getPictureNoLimit() !== $this) {
            $noLimitId->setPictureNoLimit($this);
        }

        $this->noLimitId = $noLimitId;

        return $this;
    }
}
