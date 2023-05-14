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
        $this->createCategories('Entrées chaudes',1, $manager);
        $this->createCategories('Entrées froides',2, $manager);
        $this->createCategories('Plats chauds',3, $manager);
        $this->createCategories('Plats froids',4, $manager);
        $this->createCategories('Plats végétariens',5, $manager);
        $this->createCategories('Desserts chauds',6, $manager);
        $this->createCategories('Desserts froids',7, $manager);
        $this->createCategories('Pizzas',8, $manager);
        $this->createCategories('Burgers',9, $manager);
        $this->createCategories('Spécialités du chef',10, $manager);

        

        $manager->flush();
    }

    public function createCategories(string $name,int $categoryOrder, ObjectManager $manager): Categories
    {
        $categories = new Categories();
        $categories->setTitle($name);
        $categories->setCategoryOrder($categoryOrder);
        
       

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
