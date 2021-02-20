<?php

namespace App\Entity\Discussion\Discussion;

use App\Entity\AbstractEntity\AbstractLink;
use App\Entity\Discussion\Discussion;
use App\Repository\Discussion\LinkDiscussionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LinkDiscussionRepository::class)
 */
class LinkDiscussion extends AbstractLink
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=Discussion::class, mappedBy="linkDiscussion", cascade={"persist", "remove"})
     */
    private $discussions;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDiscussions(): ?Discussion
    {
        return $this->discussions;
    }

    public function setDiscussions(?Discussion $discussions): self
    {
        // unset the owning side of the relation if necessary
        if ($discussions === null && $this->discussions !== null) {
            $this->discussions->setLinkDiscussion(null);
        }

        // set the owning side of the relation if necessary
        if ($discussions !== null && $discussions->getLinkDiscussion() !== $this) {
            $discussions->setLinkDiscussion($this);
        }

        $this->discussions = $discussions;

        return $this;
    }
}
