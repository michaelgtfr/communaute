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
            $this->discussions->setCommentDiscussion(null);
        }

        // set the owning side of the relation if necessary
        if ($discussions !== null && $discussions->getCommentDiscussion() !== $this) {
            $discussions->setCommentDiscussion($this);
        }

        $this->discussions = $discussions;

        return $this;
    }
}
