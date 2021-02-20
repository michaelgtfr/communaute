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
            $this->discussions->setPictureDiscussion(null);
        }

        // set the owning side of the relation if necessary
        if ($discussions !== null && $discussions->getPictureDiscussion() !== $this) {
            $discussions->setPictureDiscussion($this);
        }

        $this->discussions = $discussions;

        return $this;
    }
}
