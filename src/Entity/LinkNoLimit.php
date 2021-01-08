<?php

namespace App\Entity;

use App\Entity\AbstractEntity\AbstractLink;
use App\Repository\LinkNoLimitRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LinkNoLimitRepository::class)
 */
class LinkNoLimit extends AbstractLink
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
