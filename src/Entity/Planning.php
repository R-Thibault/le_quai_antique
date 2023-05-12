<?php

namespace App\Entity;

use App\Repository\PlanningRepository;
use Doctrine\DBAL\Types\Types;
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

    #[ORM\Column]
    private ?string $open_am = null;

    #[ORM\Column]
    private ?string $close_am = null;

    #[ORM\Column]
    private ?string $open_pm = null;

    #[ORM\Column]
    private ?string $close_pm = null;

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

    public function getOpenAm(): string
    {
        return $this->open_am;
    }

    public function setOpenAm(string $open_am): self
    {
        $this->open_am = $open_am;

        return $this;
    }

    public function getCloseAm(): string
    {
        return $this->close_am;
    }

    public function setCloseAm(string $close_am): self
    {
        $this->close_am = $close_am;

        return $this;
    }

    public function getOpenPm(): string
    {
        return $this->open_pm;
    }

    public function setOpenPm(string $open_pm): self
    {
        $this->open_pm = $open_pm;

        return $this;
    }

    public function getClosePm(): string
    {
        return $this->close_pm;
    }

    public function setClosePm(string $close_pm): self
    {
        $this->close_pm = $close_pm;

        return $this;
    }
}
