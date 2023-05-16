<?php

namespace App\DataFixtures;

use App\Entity\Images;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class ImagesFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        
        $faker = Faker\Factory::create('fr_FR');
        for($img = 1; $img <= 6; $img++){
            $images = new Images();
            $images->setTitle($faker->text(rand(5, 12)));
            $images->setImageName('image'.$img.'.jpg');
    
    
            $manager->persist($images);
        };

        $manager->flush();
    }
}
