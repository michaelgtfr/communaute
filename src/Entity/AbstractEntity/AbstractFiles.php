<?php
/**
 * Created by PhpStorm.
 * User: mickd
 * Date: 06/01/2021
 * Time: 21:55
 */

namespace App\Entity\AbstractEntity;

use Doctrine\ORM\Mapping as ORM;

class AbstractFiles extends AbstractComment
{
    /**
     * @ORM\Column(type="string", length=60)
     */
    protected $name;

    /**
     * @ORM\Column(type="string", length=4)
     */
    protected $extension;

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getExtension(): ?string
    {
        return $this->extension;
    }

    public function setExtension(?string $extension): self
    {
        $this->extension = $extension;

        return $this;
    }
}