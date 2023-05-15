<?php

namespace App\DataFixtures;

use App\Entity\CombosMeals;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class CombosMealsFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        for($combo = 1; $combo <= 3; $combo++){
            $this->createCombosMeals($faker->text(rand(5, 12)), $manager);
        }

        $manager->flush();
    }

    public function createCombosMeals(string $name, ObjectManager $manager): CombosMeals
    {
        $combosMeals = new CombosMeals();
        $combosMeals->setTitle($name);

        $manager->persist($combosMeals);

        $this->addReference($name, $combosMeals);
        return $combosMeals;
    }
    
}
