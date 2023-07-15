<?php

namespace App\Entity;

use App\Repository\TypeAuditRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeAuditRepository::class)]
class TypeAudit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Name = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }


    public function __toString()
    {
           return $this->getName();
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }
}
