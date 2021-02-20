<?php

namespace App\Entity\Pub;

use App\Entity\Account\Editor;
use App\Repository\Pub\PublicityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PublicityRepository::class)
 */
class Publicity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $numberViewsActual;

    /**
     * @ORM\Column(type="integer")
     */
    private $numberViewsMax;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateCreate;

    /**
     * @ORM\Column(type="integer")
     */
    private $price;

    /**
     * @ORM\Column(type="integer")
     */
    private $status;

    /**
     * @ORM\ManyToOne(targetEntity=Editor::class, inversedBy="publicity")
     * @ORM\JoinColumn(nullable=false)
     */
    private $editors;

    /**
     * @ORM\OneToMany(targetEntity=PicturePub::class, mappedBy="publicitys", orphanRemoval=true)
     */
    private $picturePub;

    /**
     * @ORM\OneToMany(targetEntity=VideoPub::class, mappedBy="publicitys", orphanRemoval=true)
     */
    private $videoPub;

    /**
     * @ORM\OneToMany(targetEntity=LinkPub::class, mappedBy="publicitys", orphanRemoval=true)
     */
    private $linkPub;

    /**
     * @ORM\OneToMany(targetEntity=CommentPub::class, mappedBy="publicitys", orphanRemoval=true)
     */
    private $commentPub;

    public function __construct()
    {
        $this->picturePub = new ArrayCollection();
        $this->videoPub = new ArrayCollection();
        $this->linkPub = new ArrayCollection();
        $this->commentPub = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumberViewsActual(): ?int
    {
        return $this->numberViewsActual;
    }

    public function setNumberViewsActual(?int $numberViewsActual): self
    {
        $this->numberViewsActual = $numberViewsActual;

        return $this;
    }

    public function getNumberViewsMax(): ?int
    {
        return $this->numberViewsMax;
    }

    public function setNumberViewsMax(int $numberViewsMax): self
    {
        $this->numberViewsMax = $numberViewsMax;

        return $this;
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

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function setStatus(int $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getEditors(): ?Editor
    {
        return $this->editors;
    }

    public function setEditors(?Editor $editors): self
    {
        $this->editors = $editors;

        return $this;
    }

    /**
     * @return Collection|PicturePub[]
     */
    public function getPicturePub(): Collection
    {
        return $this->picturePub;
    }

    public function addPicturePub(PicturePub $picturePub): self
    {
        if (!$this->picturePub->contains($picturePub)) {
            $this->picturePub[] = $picturePub;
            $picturePub->setPublicitys($this);
        }

        return $this;
    }

    public function removePicturePub(PicturePub $picturePub): self
    {
        if ($this->picturePub->removeElement($picturePub)) {
            // set the owning side to null (unless already changed)
            if ($picturePub->getPublicitys() === $this) {
                $picturePub->setPublicitys(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|VideoPub[]
     */
    public function getVideoPub(): Collection
    {
        return $this->videoPub;
    }

    public function addVideoPub(VideoPub $videoPub): self
    {
        if (!$this->videoPub->contains($videoPub)) {
            $this->videoPub[] = $videoPub;
            $videoPub->setPublicitys($this);
        }

        return $this;
    }

    public function removeVideoPub(VideoPub $videoPub): self
    {
        if ($this->videoPub->removeElement($videoPub)) {
            // set the owning side to null (unless already changed)
            if ($videoPub->getPublicitys() === $this) {
                $videoPub->setPublicitys(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|LinkPub[]
     */
    public function getLinkPub(): Collection
    {
        return $this->linkPub;
    }

    public function addLinkPub(LinkPub $linkPub): self
    {
        if (!$this->linkPub->contains($linkPub)) {
            $this->linkPub[] = $linkPub;
            $linkPub->setPublicitys($this);
        }

        return $this;
    }

    public function removeLinkPub(LinkPub $linkPub): self
    {
        if ($this->linkPub->removeElement($linkPub)) {
            // set the owning side to null (unless already changed)
            if ($linkPub->getPublicitys() === $this) {
                $linkPub->setPublicitys(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|CommentPub[]
     */
    public function getCommentPub(): Collection
    {
        return $this->commentPub;
    }

    public function addCommentPub(CommentPub $commentPub): self
    {
        if (!$this->commentPub->contains($commentPub)) {
            $this->commentPub[] = $commentPub;
            $commentPub->setPublicitys($this);
        }

        return $this;
    }

    public function removeCommentPub(CommentPub $commentPub): self
    {
        if ($this->commentPub->removeElement($commentPub)) {
            // set the owning side to null (unless already changed)
            if ($commentPub->getPublicitys() === $this) {
                $commentPub->setPublicitys(null);
            }
        }

        return $this;
    }
}
