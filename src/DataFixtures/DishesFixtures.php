<?php

namespace App\DataFixtures;

use App\Entity\Dishes;
use App\Entity\Images;
use App\Entity\Categories;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class DishesFixtures extends Fixture implements DependentFixtureInterface
{   

    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        $categories = $manager->getRepository(Categories::class)->findAll();
        $images = $manager->getRepository(Images::class)->findAll();

        for($dish = 1; $dish <= 20; $dish++){
            $dishes = new Dishes();
            $dishes->setTitle($faker->text(rand(5, 12)));
            $dishes->setPrice($faker->numberBetween(800,1600));
            
            $counter = rand(1,3);
            for($i = 0; $i < $counter; $i++){
                $dishes->addCategory($faker->randomElement($categories));
            }
            $dishes->setDescription($faker->paragraph(2));
            for($i = 0; $i < $counter; $i++){
                $dishes->addImage($faker->randomElement($images));
            }
                
           

            
            $manager->persist($dishes);
        }
        

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CategoriesFixtures::class,
            ImagesFixture::class,
        ];
    }

    
}
