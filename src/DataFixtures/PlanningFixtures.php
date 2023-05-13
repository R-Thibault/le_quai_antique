<?php

namespace App\DataFixtures;

use App\Entity\Planning;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


class PlanningFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
             
     
        $this->createPlanning ('lundi', 1130, 1400, 1800, 2200, $manager);
        $this->createPlanning ('mardi', 1100, 1400, 1800, 2200, $manager);
        $this->createPlanning ('mercredi', 1100, 1400, 1800, 2200, $manager);
        $this->createPlanning ('jeudi', 1100, 1400, 1800, 2200, $manager);
        $this->createPlanning ('vendredi', 1100, 1400, 1800, 2200, $manager);
        $this->createPlanning ('samedi', 1100, 1400, 1800, 2200, $manager);
        $this->createPlanning ('dimanche', 1100, 1400, 1800, 2200, $manager);

        
        $manager->flush();
    }

    public function createPlanning(string $day, int $openAm, int $closeAm, int $openPm, int $closePm, ObjectManager $manager): Planning
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
