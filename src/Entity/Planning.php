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

    #[ORM\Column( nullable: true)]
    private ?string $openAm = null;

    #[ORM\Column( nullable: true)]
    private ?string $closeAm = null;

    #[ORM\Column]
    private ?bool $isClosedAm = null;

    #[ORM\Column( nullable: true)]
    private ?string $openPM = null;

    #[ORM\Column( nullable: true)]
    private ?string $closePm = null;

    #[ORM\Column]
    private ?bool $isClosedPm = null;

    #[ORM\Column(length: 255)]
    private ?string $day_fr = null;

   

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


    public function getOpenAm(): ?string
    {
        return $this->openAm;
    }

    public function setOpenAm(?string $openAm): self
    {
        $this->openAm = $openAm;

        return $this;
    }

    public function getCloseAm(): ?string
    {
        return $this->closeAm;
    }

    public function setCloseAm(?string $closeAm): self
    {
        $this->closeAm = $closeAm;

        return $this;
    }

    public function isIsClosedAm(): ?bool
    {
        return $this->isClosedAm;
    }

    public function setIsClosedAm(bool $isClosedAm): self
    {
        $this->isClosedAm = $isClosedAm;

        return $this;
    }

    public function getOpenPM(): ?string
    {
        return $this->openPM;
    }

    public function setOpenPM(?string $openPM): self
    {
        $this->openPM = $openPM;

        return $this;
    }

    public function getClosePm(): ?string
    {
        return $this->closePm;
    }

    public function setClosePm(?string $closePm): self
    {
        $this->closePm = $closePm;

        return $this;
    }

    public function isIsClosedPm(): ?bool
    {
        return $this->isClosedPm;
    }

    public function setIsClosedPm(bool $isClosedPm): self
    {
        $this->isClosedPm = $isClosedPm;

        return $this;
    }

    public function getDayFr(): ?string
    {
        return $this->day_fr;
    }

    public function setDayFr(string $day_fr): self
    {
        $this->day_fr = $day_fr;

        return $this;
    }
}
