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

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $openAm = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $closeAm = null;

    #[ORM\Column]
    private ?bool $isClosedAm = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $openPM = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $closePm = null;

    #[ORM\Column]
    private ?bool $isClosedPm = null;

   

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


    public function getOpenAm(): ?\DateTimeInterface
    {
        return $this->openAm;
    }

    public function setOpenAm(?\DateTimeInterface $openAm): self
    {
        $this->openAm = $openAm;

        return $this;
    }

    public function getCloseAm(): ?\DateTimeInterface
    {
        return $this->closeAm;
    }

    public function setCloseAm(?\DateTimeInterface $closeAm): self
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

    public function getOpenPM(): ?\DateTimeInterface
    {
        return $this->openPM;
    }

    public function setOpenPM(?\DateTimeInterface $openPM): self
    {
        $this->openPM = $openPM;

        return $this;
    }

    public function getClosePm(): ?\DateTimeInterface
    {
        return $this->closePm;
    }

    public function setClosePm(?\DateTimeInterface $closePm): self
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
}
