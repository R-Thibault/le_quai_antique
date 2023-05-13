<?php

namespace App\DataFixtures;
use App\Entity\Images;
use Faker;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ImagesFixture extends Fixture 
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        for($img = 1; $img <= 30; $img++){
            $this->createImages($faker->text(rand(5, 12)), $manager);
        }
        $manager->flush();
    }

    public function createImages(string $name, ObjectManager $manager): Images
    {
        $images = new Images();
        $images->setTitle($name);
        

        $manager->persist($images);

        $this->setReference($name, $images);
        

        return $images;
    }




   
}
