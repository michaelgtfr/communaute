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
    private $discussionId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDiscussionId(): ?Discussion
    {
        return $this->discussionId;
    }

    public function setDiscussionId(?Discussion $discussionId): self
    {
        // unset the owning side of the relation if necessary
        if ($discussionId === null && $this->discussionId !== null) {
            $this->discussionId->setLinkDiscussion(null);
        }

        // set the owning side of the relation if necessary
        if ($discussionId !== null && $discussionId->getLinkDiscussion() !== $this) {
            $discussionId->setLinkDiscussion($this);
        }

        $this->discussionId = $discussionId;

        return $this;
    }
}
