<?php

namespace App\Entity;

use App\Entity\AbstractEntity\AbstractLink;
use App\Repository\LinkDiscussionRepository;
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

    public function getId(): ?int
    {
        return $this->id;
    }
}
