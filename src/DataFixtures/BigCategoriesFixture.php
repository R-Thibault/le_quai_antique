<?php

namespace App\DataFixtures;

use App\Entity\BigCategories;
use Doctrine\Bundle\FixturesBundle\Fixture;

use Doctrine\Persistence\ObjectManager;

class BigCategoriesFixture extends Fixture
{
    public function load(ObjectManager $manager) :void
    {
        
        
        $this->createBigCategories('Entrées',1, $manager);
        $this->createBigCategories('Plats',2, $manager);
        $this->createBigCategories('Desserts',3, $manager);
        $this->createBigCategories('Autres Catégories',4, $manager);
       

        



        $manager->flush();
    }

    public function createBigCategories(string $name,int $order, ObjectManager $manager): BigCategories
    {
        $bigCategories = new BigCategories();
        $bigCategories->setTitle($name);
       

        $manager->persist($bigCategories);

        $this->addReference($order, $bigCategories);
        return $bigCategories;
    }

    

  
}
