<?php

namespace App\Entity\Discussion;

use App\Entity\Account\User;
use App\Repository\Discussion\DiscussionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DiscussionRepository::class)
 */
class Discussion
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
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="discussions")
     */
    private $users;

    /**
     * @ORM\OneToOne(targetEntity=CommentDiscussion::class, inversedBy="discussions", cascade={"persist", "remove"})
     */
    private $commentDiscussion;

    /**
     * @ORM\OneToOne(targetEntity=LinkDiscussion::class, inversedBy="discussions", cascade={"persist", "remove"})
     */
    private $linkDiscussion;

    /**
     * @ORM\OneToOne(targetEntity=VideoDiscussion::class, inversedBy="discussions", cascade={"persist", "remove"})
     */
    private $videoDiscussion;

    /**
     * @ORM\OneToOne(targetEntity=PictureDiscussion::class, inversedBy="discussions", cascade={"persist", "remove"})
     */
    private $pictureDiscussion;

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

    public function getCommentDiscussion(): ?CommentDiscussion
    {
        return $this->commentDiscussion;
    }

    public function setCommentDiscussion(?CommentDiscussion $commentDiscussion): self
    {
        $this->commentDiscussion = $commentDiscussion;

        return $this;
    }

    public function getLinkDiscussion(): ?LinkDiscussion
    {
        return $this->linkDiscussion;
    }

    public function setLinkDiscussion(?LinkDiscussion $linkDiscussion): self
    {
        $this->linkDiscussion = $linkDiscussion;

        return $this;
    }

    public function getVideoDiscussion(): ?VideoDiscussion
    {
        return $this->videoDiscussion;
    }

    public function setVideoDiscussion(?VideoDiscussion $videoDiscussion): self
    {
        $this->videoDiscussion = $videoDiscussion;

        return $this;
    }

    public function getPictureDiscussion(): ?PictureDiscussion
    {
        return $this->pictureDiscussion;
    }

    public function setPictureDiscussion(?PictureDiscussion $pictureDiscussion): self
    {
        $this->pictureDiscussion = $pictureDiscussion;

        return $this;
    }
}
