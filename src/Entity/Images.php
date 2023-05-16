<?php

namespace App\Entity;

use App\Repository\ImagesRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;



#[ORM\Entity(repositoryClass: ImagesRepository::class)]

class Images
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    
    #[ORM\Column(length: 255, nullable: true)]
    private ?string $imageName = null;


    #[ORM\ManyToOne(inversedBy: 'image')]
    private ?Dishes $dishes = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $title = null;


    
    
    
    public function getId(): ?int
    {
        return $this->id;
    }


    public function getImageName(): ?string
    {
        return $this->imageName;
    }

    public function setImageName(string $imageName): self
    {
        $this->imageName = $imageName;

        return $this;
    }

    
    public function getDishes(): ?Dishes
    {
        return $this->dishes;
    }

    public function setDishes(?Dishes $dishes): self
    {
        $this->dishes = $dishes;

        return $this;
    }


    public function __toString(): string
    {
        return $this->title;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }


}
