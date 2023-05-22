<?php

namespace App\DataFixtures;

use App\Entity\Planning;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Validator\Constraints\Time;

class PlanningFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
             $this->createPlanning('Monday','Lundi', '11:00', '14:00', '19:00', '22:00', false, false, $manager);
                $this->createPlanning('Tuesday','Mardi', '11:00', '14:00', '19:00', '22:00', false, false, $manager);
                $this->createPlanning('Wednesday','Mercredi', '11:00', '14:00', '19:00', '22:00', false, false, $manager);
                $this->createPlanning('Thursday','Jeudi', '11:00', '14:00', '19:00', '22:00', false, false, $manager);
                $this->createPlanning('Friday','Vendredi', '11:00', '14:00', '19:00', '22:00', false, false, $manager);
                $this->createPlanning('Saturday','Samedi', '11:00', '14:00', '19:00', '22:00', false, false, $manager);
                $this->createPlanning('Sunday','Dimanche', '11:00', '14:00', '19:00', '22:00', false, false, $manager);
     
        

        
        $manager->flush();
    }

    public function createPlanning(string $day,string $dayFr, string $openAm, string  $closeAm,  string $openPm,  string $closePm, bool $isClosedAm ,bool $isClosedPm ,ObjectManager $manager): Planning
    {
        $planning = new Planning();
        $planning->setDay($day);
        $planning->setDayFr($dayFr);
        $planning->setOpenAm($openAm);
        $planning->setCloseAm($closeAm);
        $planning->setOpenPm($openPm);
        $planning->setClosePm($closePm);
        $planning->setisClosedAm($isClosedAm);
        $planning->setisClosedPm($isClosedPm);
        $manager->persist($planning);


        return $planning;
    }
}
