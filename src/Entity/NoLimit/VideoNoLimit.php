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
            $this->noLimitId->setVideoNoLimit(null);
        }

        // set the owning side of the relation if necessary
        if ($noLimitId !== null && $noLimitId->getVideoNoLimit() !== $this) {
            $noLimitId->setVideoNoLimit($this);
        }

        $this->noLimitId = $noLimitId;

        return $this;
    }
}
