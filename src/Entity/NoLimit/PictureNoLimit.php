<?php

namespace App\Entity\NoLimit;

use App\Entity\AbstractEntity\AbstractFiles;
use App\Repository\NoLimit\PictureNoLimitRepository;
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
    private $noLimits;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNoLimits(): ?NoLimit
    {
        return $this->noLimits;
    }

    public function setNoLimits(?NoLimit $noLimits): self
    {
        // unset the owning side of the relation if necessary
        if ($noLimits === null && $this->noLimits !== null) {
            $this->noLimits->setPictureNoLimit(null);
        }

        // set the owning side of the relation if necessary
        if ($noLimits !== null && $noLimits->getPictureNoLimit() !== $this) {
            $noLimits->setPictureNoLimit($this);
        }

        $this->noLimits = $noLimits;

        return $this;
    }
}
