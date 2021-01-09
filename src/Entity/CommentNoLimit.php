<?php

namespace App\Entity;

use App\Entity\AbstractEntity\AbstractComment;
use App\Repository\CommentNoLimitRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommentNoLimitRepository::class)
 */
class CommentNoLimit extends AbstractComment
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=NoLimit::class, mappedBy="commentNoLimit", cascade={"persist", "remove"})
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
            $this->noLimitId->setCommentNoLimit(null);
        }

        // set the owning side of the relation if necessary
        if ($noLimitId !== null && $noLimitId->getCommentNoLimit() !== $this) {
            $noLimitId->setCommentNoLimit($this);
        }

        $this->noLimitId = $noLimitId;

        return $this;
    }
}
