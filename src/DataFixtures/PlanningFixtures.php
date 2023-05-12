<?php

namespace App\DataFixtures;

use App\Entity\Planning;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


class PlanningFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
             
     
        $this->createPlanning ('lundis', '11:00', '14:00', '18:00', '22:00', $manager);
        $this->createPlanning ('mardis', '11:00', '14:00', '18:00', '22:00', $manager);
        $this->createPlanning ('mercredis', '11:00', '14:00', '18:00', '22:00', $manager);
        $this->createPlanning ('jeudis', '11:00', '14:00', '18:00', '22:00', $manager);
        $this->createPlanning ('vendredis', '11:00', '14:00', '18:00', '22:00', $manager);
        $this->createPlanning ('samedis', '11:00', '14:00', '18:00', '22:00', $manager);
        $this->createPlanning ('dimanches', '11:00', '14:00', '18:00', '22:00', $manager);

        
        $manager->flush();
    }

    public function createPlanning(string $day, string $openAm, string $closeAm, string $openPm, string $closePm, ObjectManager $manager): Planning
    {
        $planning = new Planning();
        $planning->setDay($day);
        $planning->setOpenAm($openAm);
        $planning->setCloseAm($closeAm);
        $planning->setOpenPm($openPm);
        $planning->setClosePm($closePm);
        $manager->persist($planning);


        return $planning;
    }
}
