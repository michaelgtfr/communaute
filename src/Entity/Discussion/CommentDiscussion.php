<?php

namespace App\Entity\Discussion;

use App\Entity\AbstractEntity\AbstractComment;
use App\Repository\Discussion\CommentDiscussionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommentDiscussionRepository::class)
 */
class CommentDiscussion extends AbstractComment
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=Discussion::class, mappedBy="commentDiscussion", cascade={"persist", "remove"})
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
            $this->discussionId->setCommentDiscussion(null);
        }

        // set the owning side of the relation if necessary
        if ($discussionId !== null && $discussionId->getCommentDiscussion() !== $this) {
            $discussionId->setCommentDiscussion($this);
        }

        $this->discussionId = $discussionId;

        return $this;
    }
}
