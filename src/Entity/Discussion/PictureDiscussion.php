<?php

namespace App\Entity\Discussion;

use App\Entity\AbstractEntity\AbstractFiles;
use App\Repository\Discussion\PictureDiscussionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PictureDiscussionRepository::class)
 */
class PictureDiscussion extends AbstractFiles
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=Discussion::class, mappedBy="pictureDiscussion", cascade={"persist", "remove"})
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
            $this->discussionId->setPictureDiscussion(null);
        }

        // set the owning side of the relation if necessary
        if ($discussionId !== null && $discussionId->getPictureDiscussion() !== $this) {
            $discussionId->setPictureDiscussion($this);
        }

        $this->discussionId = $discussionId;

        return $this;
    }
}
