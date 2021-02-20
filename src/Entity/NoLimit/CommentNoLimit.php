<?php

namespace App\Entity\NoLimit;

use App\Entity\AbstractEntity\AbstractComment;
use App\Repository\NoLimit\CommentNoLimitRepository;
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
            $this->noLimits->setCommentNoLimit(null);
        }

        // set the owning side of the relation if necessary
        if ($noLimits !== null && $noLimits->getCommentNoLimit() !== $this) {
            $noLimits->setCommentNoLimit($this);
        }

        $this->noLimits = $noLimits;

        return $this;
    }
}
