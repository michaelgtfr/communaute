<?php

namespace App\Entity\NoLimit;

use App\Entity\AbstractEntity\AbstractLink;
use App\Repository\NoLimit\LinkNoLimitRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LinkNoLimitRepository::class)
 */
class LinkNoLimit extends AbstractLink
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=NoLimit::class, mappedBy="linkNoLimit", cascade={"persist", "remove"})
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
            $this->noLimits->setLinkNoLimit(null);
        }

        // set the owning side of the relation if necessary
        if ($noLimits !== null && $noLimits->getLinkNoLimit() !== $this) {
            $noLimits->setLinkNoLimit($this);
        }

        $this->noLimits = $noLimits;

        return $this;
    }
}
