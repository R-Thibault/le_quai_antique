<?php

namespace App\DataFixtures;

use App\Entity\Categories;

use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;

use Doctrine\Persistence\ObjectManager;

class CategoriesFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $this->createCategories('Entrées chaudes',1, 1, $manager);
        $this->createCategories('Entrées froides',2, 1, $manager);
        $this->createCategories('Plats chauds',3, 2, $manager);
        $this->createCategories('Plats froids',4, 2, $manager);
        $this->createCategories('Plats végétariens',5, 2, $manager);
        $this->createCategories('Desserts chauds',6, 3, $manager);
        $this->createCategories('Desserts froids',7, 3, $manager);
        $this->createCategories('Pizzas',8, 4, $manager);
        $this->createCategories('Burgers',9, 4, $manager);
        $this->createCategories('Spécialités du chef',10, 4, $manager);

        

        $manager->flush();
    }

    public function createCategories(string $name,int $categoryOrder, int $bigCategories, ObjectManager $manager): Categories
    {
        $categories = new Categories();
        $categories->setTitle($name);
        $categories->setCategoryOrder($categoryOrder);
        $categories->setBigCategory($this->getReference($bigCategories));
       

        $manager->persist($categories);

        

        return $categories;
    }

    public function getDependencies()
    {
        return [
            BigCategoriesFixture::class,
        ];
    }



    
}
