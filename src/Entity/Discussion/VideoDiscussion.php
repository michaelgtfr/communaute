<?php

namespace App\Entity\Discussion;

use App\Entity\AbstractEntity\AbstractFiles;
use App\Repository\Discussion\VideoDiscussionRepository;
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
            $this->discussions->setVideoDiscussion(null);
        }

        // set the owning side of the relation if necessary
        if ($discussions !== null && $discussions->getVideoDiscussion() !== $this) {
            $discussions->setVideoDiscussion($this);
        }

        $this->discussions = $discussions;

        return $this;
    }
}
