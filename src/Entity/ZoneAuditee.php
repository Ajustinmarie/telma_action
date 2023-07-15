<?php

namespace App\Entity;

use App\Repository\ZoneAuditeeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ZoneAuditeeRepository::class)]
class ZoneAuditee
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function __toString()
    {
           return $this->getName();
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }
}
