<?php

namespace App\Entity;

use App\Entity\AbstractEntity\AbstractLink;
use App\Repository\LinkPostRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LinkPostRepository::class)
 */
class LinkPost extends AbstractLink
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
