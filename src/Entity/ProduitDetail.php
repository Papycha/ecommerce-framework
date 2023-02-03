<?php

namespace App\Entity;

use App\Repository\ProduitDetailRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProduitDetailRepository::class)]
class ProduitDetail
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 55)]
    private ?string $format = null;

    #[ORM\Column(length: 55)]
    private ?string $prix = null;

    #[ORM\Column(length: 55)]
    private ?string $prix_livraison = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFormat(): ?string
    {
        return $this->format;
    }

    public function setFormat(string $format): self
    {
        $this->format = $format;

        return $this;
    }

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(string $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getPrixLivraison(): ?string
    {
        return $this->prix_livraison;
    }

    public function setPrixLivraison(string $prix_livraison): self
    {
        $this->prix_livraison = $prix_livraison;

        return $this;
    }
}
