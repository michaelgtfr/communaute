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
            $this->noLimitId->setLinkNoLimit(null);
        }

        // set the owning side of the relation if necessary
        if ($noLimitId !== null && $noLimitId->getLinkNoLimit() !== $this) {
            $noLimitId->setLinkNoLimit($this);
        }

        $this->noLimitId = $noLimitId;

        return $this;
    }
}
