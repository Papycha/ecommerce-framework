<?php

namespace App\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\String\Slugger\SluggerInterface;

trait SlugTrait
{
    #[ORM\PrePersist]
    #[ORM\PreUpdate]
    public function setSlugValue(): void
    {
        $slugger = new \Symfony\Component\String\Slugger\AsciiSlugger();
        $this->slug = $slugger->slug($this->getTitle())->lower();
    }
}
