<?php
/**
 * Created by PhpStorm.
 * User: mickd
 * Date: 06/01/2021
 * Time: 21:46
 */

namespace App\Entity\AbstractEntity;

use Doctrine\ORM\Mapping as ORM;

abstract class AbstractLink extends AbstractComment
{
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $link;

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(?string $link): self
    {
        $this->link = $link;

        return $this;
    }
}