<?php

namespace App\Entity\NoLimit;

use App\Entity\AbstractEntity\AbstractFiles;
use App\Repository\NoLimit\VideoNoLimitRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VideoNoLimitRepository::class)
 */
class VideoNoLimit extends AbstractFiles
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=NoLimit::class, mappedBy="videoNoLimit", cascade={"persist", "remove"})
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
            $this->noLimits->setVideoNoLimit(null);
        }

        // set the owning side of the relation if necessary
        if ($noLimits !== null && $noLimits->getVideoNoLimit() !== $this) {
            $noLimits->setVideoNoLimit($this);
        }

        $this->noLimits = $noLimits;

        return $this;
    }
}
