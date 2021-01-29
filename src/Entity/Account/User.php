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
     * @ORM\OneToMany(targetEntity=Post::class, mappedBy="users")
     */
    private $posts;

    /**
     * @ORM\OneToMany(targetEntity=Discussion::class, mappedBy="users")
     */
    private $discussions;

    /**
     * @ORM\OneToOne(targetEntity=AccountParameter::class, inversedBy="users", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $accountParameters;

    /**
     * @ORM\OneToMany(targetEntity=PictureUser::class, mappedBy="users", orphanRemoval=true, cascade={"persist", "remove"})
     */
    private $pictureUsers;

    /**
     * @ORM\OneToOne(targetEntity=Friends::class, inversedBy="users", cascade={"persist", "remove"})
     */
    private $friends;

    /**
     * @ORM\OneToMany(targetEntity=NoLimit::class, mappedBy="users")
     */
    private $noLimits;

    private $completePictureName;

    public function __construct()
    {
        $this->posts = new ArrayCollection();
        $this->discussions = new ArrayCollection();
        $this->pictureUsers = new ArrayCollection();
        $this->noLimits = new ArrayCollection();
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
    public function getPosts(): Collection
    {
        return $this->posts;
    }

    public function addPosts(Post $posts): self
    {
        if (!$this->posts->contains($posts)) {
            $this->posts[] = $posts;
            $posts->setUsers($this);
        }

        return $this;
    }

    public function removePosts(Post $posts): self
    {
        if ($this->posts->removeElement($posts)) {
            // set the owning side to null (unless already changed)
            if ($posts->getUsers() === $this) {
                $posts->setUsers(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Discussion[]
     */
    public function getDiscussions(): Collection
    {
        return $this->discussions;
    }

    public function addDiscussions(Discussion $discussions): self
    {
        if (!$this->discussions->contains($discussions)) {
            $this->discussions[] = $discussions;
            $discussions->setUsers($this);
        }

        return $this;
    }

    public function removeDiscussions(Discussion $discussions): self
    {
        if ($this->discussions->removeElement($discussions)) {
            // set the owning side to null (unless already changed)
            if ($discussions->getUsers() === $this) {
                $discussions->setUsers(null);
            }
        }

        return $this;
    }

    public function getAccountParameters(): ?AccountParameter
    {
        return $this->accountParameters;
    }

    public function setAccountParameters(AccountParameter $accountParameters): self
    {
        $this->accountParameters = $accountParameters;

        return $this;
    }

    /**
     * @return Collection|PictureUser[]
     */
    public function getPictureUsers(): Collection
    {
        return $this->pictureUsers;
    }

    public function addPictureUsers(PictureUser $pictureUsers): self
    {
        if (!$this->pictureUsers->contains($pictureUsers)) {
            $this->pictureUsers[] = $pictureUsers;
            $pictureUsers->setUsers($this);
        }

        return $this;
    }

    public function removePictureUsers(PictureUser $pictureUsers): self
    {
        if ($this->pictureUsers->removeElement($pictureUsers)) {
            // set the owning side to null (unless already changed)
            if ($pictureUsers->getUsers() === $this) {
                $pictureUsers->setUsers(null);
            }
        }

        return $this;
    }

    public function getFriends(): ?Friends
    {
        return $this->friends;
    }

    public function setFriends(?Friends $friends): self
    {
        $this->friends = $friends;

        return $this;
    }

    /**
     * @return Collection|NoLimit[]
     */
    public function getNoLimits(): Collection
    {
        return $this->noLimits;
    }

    public function addNoLimits(NoLimit $noLimits): self
    {
        if (!$this->noLimits->contains($noLimits)) {
            $this->noLimits[] = $noLimits;
            $noLimits->setUsers($this);
        }

        return $this;
    }

    public function removeNoLimits(NoLimit $noLimits): self
    {
        if ($this->noLimits->removeElement($noLimits)) {
            // set the owning side to null (unless already changed)
            if ($noLimits->getUsers() === $this) {
                $noLimits->setUsers(null);
            }
        }

        return $this;
    }

    public function getCompletePictureName(): ?string
    {
        return $this->completePictureName;
    }

    public function setCompletePictureName(?string $completePictureName): self
    {
        $this->completePictureName = $completePictureName;

        return $this;
    }
}
