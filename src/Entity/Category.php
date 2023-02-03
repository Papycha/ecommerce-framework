<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
class Category
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 55)]
    private ?string $categotie = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategotie(): ?string
    {
        return $this->categotie;
    }

    public function setCategotie(string $categotie): self
    {
        $this->categotie = $categotie;

        return $this;
    }
}
