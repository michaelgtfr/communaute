<?php

namespace App\Entity\Account;

use App\Entity\AbstractEntity\AbstractAccountInformation;
use App\Entity\Discussion\Discussion;
use App\Entity\NoLimit\NoLimit;
use App\Entity\Post\Post;
use App\Repository\Account\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\Table(name="`user`")
 */
class User extends AbstractAccountInformation implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30, unique=true)
     */
    private $username;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $country;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $address;

    /**
     * @ORM\OneToMany(targetEntity=Post::class, mappedBy="userId")
     */
    private $postId;

    /**
     * @ORM\OneToMany(targetEntity=Discussion::class, mappedBy="userId")
     */
    private $discussionId;

    /**
     * @ORM\OneToOne(targetEntity=AccountParameter::class, inversedBy="userId", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $accountParameterId;

    /**
     * @ORM\OneToMany(targetEntity=PictureUser::class, mappedBy="userId", orphanRemoval=true)
     */
    private $pictureUserId;

    /**
     * @ORM\OneToOne(targetEntity=Friends::class, inversedBy="userId", cascade={"persist", "remove"})
     */
    private $friendsId;

    /**
     * @ORM\OneToMany(targetEntity=NoLimit::class, mappedBy="userId")
     */
    private $noLimitId;

    public function __construct()
    {
        $this->postId = new ArrayCollection();
        $this->discussionId = new ArrayCollection();
        $this->pictureUserId = new ArrayCollection();
        $this->noLimitId = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): self
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return Collection|Post[]
     */
    public function getPostId(): Collection
    {
        return $this->postId;
    }

    public function addPostId(Post $postId): self
    {
        if (!$this->postId->contains($postId)) {
            $this->postId[] = $postId;
            $postId->setUserId($this);
        }

        return $this;
    }

    public function removePostId(Post $postId): self
    {
        if ($this->postId->removeElement($postId)) {
            // set the owning side to null (unless already changed)
            if ($postId->getUserId() === $this) {
                $postId->setUserId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Discussion[]
     */
    public function getDiscussionId(): Collection
    {
        return $this->discussionId;
    }

    public function addDiscussionId(Discussion $discussionId): self
    {
        if (!$this->discussionId->contains($discussionId)) {
            $this->discussionId[] = $discussionId;
            $discussionId->setUserId($this);
        }

        return $this;
    }

    public function removeDiscussionId(Discussion $discussionId): self
    {
        if ($this->discussionId->removeElement($discussionId)) {
            // set the owning side to null (unless already changed)
            if ($discussionId->getUserId() === $this) {
                $discussionId->setUserId(null);
            }
        }

        return $this;
    }

    public function getAccountParameterId(): ?AccountParameter
    {
        return $this->accountParameterId;
    }

    public function setAccountParameterId(AccountParameter $accountParameterId): self
    {
        $this->accountParameterId = $accountParameterId;

        return $this;
    }

    /**
     * @return Collection|PictureUser[]
     */
    public function getPictureUserId(): Collection
    {
        return $this->pictureUserId;
    }

    public function addPictureUserId(PictureUser $pictureUserId): self
    {
        if (!$this->pictureUserId->contains($pictureUserId)) {
            $this->pictureUserId[] = $pictureUserId;
            $pictureUserId->setUserId($this);
        }

        return $this;
    }

    public function removePictureUserId(PictureUser $pictureUserId): self
    {
        if ($this->pictureUserId->removeElement($pictureUserId)) {
            // set the owning side to null (unless already changed)
            if ($pictureUserId->getUserId() === $this) {
                $pictureUserId->setUserId(null);
            }
        }

        return $this;
    }

    public function getFriendsId(): ?Friends
    {
        return $this->friendsId;
    }

    public function setFriendsId(?Friends $friendsId): self
    {
        $this->friendsId = $friendsId;

        return $this;
    }

    /**
     * @return Collection|NoLimit[]
     */
    public function getNoLimitId(): Collection
    {
        return $this->noLimitId;
    }

    public function addNoLimitId(NoLimit $noLimitId): self
    {
        if (!$this->noLimitId->contains($noLimitId)) {
            $this->noLimitId[] = $noLimitId;
            $noLimitId->setUserId($this);
        }

        return $this;
    }

    public function removeNoLimitId(NoLimit $noLimitId): self
    {
        if ($this->noLimitId->removeElement($noLimitId)) {
            // set the owning side to null (unless already changed)
            if ($noLimitId->getUserId() === $this) {
                $noLimitId->setUserId(null);
            }
        }

        return $this;
    }


}
