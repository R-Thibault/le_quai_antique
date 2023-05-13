<?php

namespace App\Entity;

use App\Repository\CategoriesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoriesRepository::class)]
class Categories
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\ManyToOne(inversedBy: 'categories')]
    #[ORM\JoinColumn(nullable: false)]
    private ?BigCategories $bigCategory = null;

    #[ORM\ManyToMany(targetEntity: Dishes::class, mappedBy: 'category')]
    private Collection $dishes;

    #[ORM\Column]
    private ?int $categoryOrder = null;

    public function __construct()
    {
        $this->dishes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getBigCategory(): ?BigCategories
    {
        return $this->bigCategory;
    }

    public function setBigCategory(?BigCategories $bigCategory): self
    {
        $this->bigCategory = $bigCategory;

        return $this;
    }

    /**
     * @return Collection<int, Dishes>
     */
    public function getDishes(): Collection
    {
        return $this->dishes;
    }

    public function addDish(Dishes $dish): self
    {
        if (!$this->dishes->contains($dish)) {
            $this->dishes->add($dish);
            $dish->addCategory($this);
        }

        return $this;
    }

    public function removeDish(Dishes $dish): self
    {
        if ($this->dishes->removeElement($dish)) {
            $dish->removeCategory($this);
        }

        return $this;
    }

    public function getCategoryOrder(): ?int
    {
        return $this->categoryOrder;
    }

    public function setCategoryOrder(int $categoryOrder): self
    {
        $this->categoryOrder = $categoryOrder;

        return $this;
    }

    public function __toString(): string
    {
        return $this->title;
    }
}
