<?php

namespace App\Entity;

use App\Entity\AbstractEntity\AbstractFiles;
use App\Repository\VideoDiscussionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VideoDiscussionRepository::class)
 */
class VideoDiscussion extends AbstractFiles
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=Discussion::class, mappedBy="videoDiscussion", cascade={"persist", "remove"})
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
            $this->discussionId->setVideoDiscussion(null);
        }

        // set the owning side of the relation if necessary
        if ($discussionId !== null && $discussionId->getVideoDiscussion() !== $this) {
            $discussionId->setVideoDiscussion($this);
        }

        $this->discussionId = $discussionId;

        return $this;
    }
}
