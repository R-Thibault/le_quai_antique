<?php

namespace App\DataFixtures;

use App\Entity\Meals;
use App\Entity\CombosMeals;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker;

class MealsFixture extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        $combosMeals = $manager->getRepository(CombosMeals::class)->findBy([], ['id' => 'ASC']);
        for($meal = 1; $meal <= 20; $meal++){
            $meals = new Meals();
            $meals->setTitle($faker->text(rand(5, 12)));
            $meals->setPrice($faker->numberBetween(1200,3000));
            $meals->setCombosMeal($faker->randomElement($combosMeals));
            $meals->setDescription($faker->paragraph(2));
            $manager->persist($meals);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CombosMealsFixture::class,
        ];
    }

}
