<?php

namespace App\Entity;

use App\Repository\PlanningRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlanningRepository::class)]
class Planning
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $day = null;

    #[ORM\Column(length: 255)]
    private ?string $openingAm = null;

    #[ORM\Column(length: 255)]
    private ?string $openingPm = null;

   

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDay(): ?string
    {
        return $this->day;
    }

    public function setDay(string $day): self
    {
        $this->day = $day;

        return $this;
    }

    

    public function __toString(): string
    {
        return $this->day;
    }

    public function getOpeningAm(): ?string
    {
        return $this->openingAm;
    }

    public function setOpeningAm(string $openingAm): self
    {
        $this->openingAm = $openingAm;

        return $this;
    }

    public function getOpeningPm(): ?string
    {
        return $this->openingPm;
    }

    public function setOpeningPm(string $openingPm): self
    {
        $this->openingPm = $openingPm;

        return $this;
    }
}
