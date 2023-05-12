<?php

namespace App\DataFixtures;

use App\Entity\Dishes;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class DishesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
       $faker = Faker\Factory::create('fr_FR');
       for($dish=1; $dish <= 12; $dish++ ){
            $dishes = new Dishes();
            $dishes->setTitle($faker->sentence(4));
            $dishes->setDescription($faker->text());
            $dishes->setPrice($faker->numberBetween(800,1600));
            
            
           
    
              $manager->persist($dishes);
       }

        $manager->flush();
    }
}
