<?php

namespace App\Entity\AbstractEntity;

use Doctrine\ORM\Mapping as ORM;


abstract class AbstractComment
{
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $comment;

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }
}
