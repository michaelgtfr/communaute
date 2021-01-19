<?php

namespace App\Entity\AbstractEntity;

use Doctrine\ORM\Mapping as ORM;


abstract class AbstractAccountInformation
{
    /**
     * @ORM\Column(type="string", length=60)
     */
    protected $name;

    /**
     * @ORM\Column(type="string", length=60)
     */
    protected $firstName;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $dateCreate;

    /**
     * @ORM\Column(type="string", length=60)
     */
    protected $email;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $dateBirth;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $dateLastConnection;

    /**
     * @var string The hashed password
     * @ORM\Column(type="string", length=60)
     */
    protected $password;

    protected $passwordConfirm;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $confirmationKey;

    /**
     * @ORM\Column(type="integer")
     */
    private $confirmation;

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getDateBirth(): ?\DateTimeInterface
    {
        return $this->dateBirth;
    }

    public function setDateBirth(?\DateTimeInterface $dateBirth): self
    {
        $this->dateBirth = $dateBirth;

        return $this;
    }

    public function getDateLastConnection(): ?\DateTimeInterface
    {
        return $this->dateLastConnection;
    }

    public function setDateLastConnection(?\DateTimeInterface $dateLastConnection): self
    {
        $this->dateLastConnection = $dateLastConnection;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getPasswordConfirm(): ?string
    {
        return $this->passwordConfirm;
    }

    public function setPasswordConfirm(?string $passwordConfirm): self
    {
        $this->passwordConfirm = $passwordConfirm;

        return $this;
    }

    public function passwordValid()
    {
        if ($this->password == $this->passwordConfirm) {
            return true;
        }
        return false;
    }

    public function getConfirmationKey(): ?string
    {
        return $this->confirmationKey;
    }

    public function setConfirmationKey(string $confirmationKey): self
    {
        $this->confirmationKey = $confirmationKey;

        return $this;
    }

    public function getConfirmation(): ?int
    {
        return $this->confirmation;
    }

    public function setConfirmation(int $confirmation): self
    {
        $this->confirmation = $confirmation;

        return $this;
    }
}
