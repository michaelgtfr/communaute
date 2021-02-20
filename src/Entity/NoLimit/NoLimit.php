<?php

namespace App\Entity\NoLimit;

use App\Entity\Account\User;
use App\Repository\NoLimit\NoLimitRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=NoLimitRepository::class)
 */
class NoLimit
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateCreate;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="noLimits")
     */
    private $users;

    /**
     * @ORM\OneToOne(targetEntity=CommentNoLimit::class, inversedBy="noLimits", cascade={"persist", "remove"})
     */
    private $commentNoLimit;

    /**
     * @ORM\OneToOne(targetEntity=LinkNoLimit::class, inversedBy="noLimits", cascade={"persist", "remove"})
     */
    private $linkNoLimit;

    /**
     * @ORM\OneToOne(targetEntity=VideoNoLimit::class, inversedBy="noLimits", cascade={"persist", "remove"})
     */
    private $videoNoLimit;

    /**
     * @ORM\OneToOne(targetEntity=PictureNoLimit::class, inversedBy="noLimits", cascade={"persist", "remove"})
     */
    private $pictureNoLimit;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateCreate(): ?\DateTimeInterface
    {
        return $this->dateCreate;
    }

    public function setDateCreate(\DateTimeInterface $dateCreate): self
    {
        $this->dateCreate = $dateCreate;

        return $this;
    }

    public function getUsers(): ?User
    {
        return $this->users;
    }

    public function setUsers(?User $users): self
    {
        $this->users = $users;

        return $this;
    }

    public function getCommentNoLimit(): ?CommentNoLimit
    {
        return $this->commentNoLimit;
    }

    public function setCommentNoLimit(?CommentNoLimit $commentNoLimit): self
    {
        $this->commentNoLimit = $commentNoLimit;

        return $this;
    }

    public function getLinkNoLimit(): ?LinkNoLimit
    {
        return $this->linkNoLimit;
    }

    public function setLinkNoLimit(?LinkNoLimit $linkNoLimit): self
    {
        $this->linkNoLimit = $linkNoLimit;

        return $this;
    }

    public function getVideoNoLimit(): ?VideoNoLimit
    {
        return $this->videoNoLimit;
    }

    public function setVideoNoLimit(?VideoNoLimit $videoNoLimit): self
    {
        $this->videoNoLimit = $videoNoLimit;

        return $this;
    }

    public function getPictureNoLimit(): ?PictureNoLimit
    {
        return $this->pictureNoLimit;
    }

    public function setPictureNoLimit(?PictureNoLimit $pictureNoLimit): self
    {
        $this->pictureNoLimit = $pictureNoLimit;

        return $this;
    }
}
