<?php

namespace App\DataFixtures;

use App\Entity\Images;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ImagesFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        
        
        for($img = 1; $img <= 6; $img++){
            $images = new Images();
            $images->setTitle('Image'.$img);
            $images->setImageName('image'.$img.'.jpg');
    
    
            $manager->persist($images);
        };

        $manager->flush();
    }
}
