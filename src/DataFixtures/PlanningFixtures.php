<?php

namespace App\DataFixtures;

use App\Entity\Planning;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


class PlanningFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
             
     
        $this->createPlanning ('lundi', 'Fermé', '19:00 - 22:00',  $manager);
        $this->createPlanning ('mardi', 'Fermé', '19:00 - 22:00', $manager);
        $this->createPlanning ('mercredi', '11:00 - 14:00', '19:00 - 22:00', $manager);
        $this->createPlanning ('jeudi', '11:00 - 14:00', '19:00 - 22:00', $manager);
        $this->createPlanning ('vendredi','11:00 - 14:00', '19:00 - 22:00',  $manager);
        $this->createPlanning ('samedi', '11:00 - 14:00', '19:00 - 22:00', $manager);
        $this->createPlanning ('dimanche', '11:00 - 14:00', '19:00 - 22:00', $manager);

        
        $manager->flush();
    }

    public function createPlanning(string $day, string $openAm, string $closeAm, ObjectManager $manager): Planning
    {
        $planning = new Planning();
        $planning->setDay($day);
        $planning->setOpeningAm($openAm);
        $planning->setOpeningPm($closeAm);
        $manager->persist($planning);


        return $planning;
    }
}
