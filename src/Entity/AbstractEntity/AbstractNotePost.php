<?php
/**
 * Created by PhpStorm.
 * User: mickd
 * Date: 07/01/2021
 * Time: 21:38
 */

namespace App\Entity\AbstractEntity;

use Doctrine\ORM\Mapping as ORM;

class AbstractNotePost
{
    /**
     * @ORM\Column(type="datetime")
     */
    protected $dateCreate;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $notePost;

    public function getDateCreate(): ?\DateTimeInterface
    {
        return $this->dateCreate;
    }

    public function setDateCreate(\DateTimeInterface $dateCreate): self
    {
        $this->dateCreate = $dateCreate;

        return $this;
    }

    public function getNotePost(): ?string
    {
        return $this->notePost;
    }

    public function setNotePost(?string $notePost): self
    {
        $this->notePost = $notePost;

        return $this;
    }
}