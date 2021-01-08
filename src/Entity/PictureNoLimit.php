<?php

namespace App\Entity;

use App\Entity\AbstractEntity\AbstractFiles;
use App\Repository\PictureNoLimitRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PictureNoLimitRepository::class)
 */
class PictureNoLimit extends AbstractFiles
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
