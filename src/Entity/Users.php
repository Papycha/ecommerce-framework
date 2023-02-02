<?php

namespace App\Entity;

use App\Repository\UsersRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UsersRepository::class)]
class Users
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 55)]
    private ?string $f_name = null;

    #[ORM\Column(length: 55)]
    private ?string $l_name = null;

    #[ORM\Column(length: 55)]
    private ?string $phone = null;

    #[ORM\Column(length: 55)]
    private ?string $email = null;

    #[ORM\Column(length: 55)]
    private ?string $pass = null;

    #[ORM\Column]
    private ?int $role = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFName(): ?string
    {
        return $this->f_name;
    }

    public function setFName(string $f_name): self
    {
        $this->f_name = $f_name;

        return $this;
    }

    public function getLName(): ?string
    {
        return $this->l_name;
    }

    public function setLName(string $l_name): self
    {
        $this->l_name = $l_name;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

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

    public function getPass(): ?string
    {
        return $this->pass;
    }

    public function setPass(string $pass): self
    {
        $this->pass = $pass;

        return $this;
    }

    public function getRole(): ?int
    {
        return $this->role;
    }

    public function setRole(int $role): self
    {
        $this->role = $role;

        return $this;
    }
}
