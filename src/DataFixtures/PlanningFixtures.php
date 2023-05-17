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
             $this->createPlanning('Lundi', new DateTime('11:00'), new DateTime('14:00'), new DateTime('19:00'), new DateTime('21:00'), false, false, $manager);
                $this->createPlanning('Mardi', new DateTime('11:00'), new DateTime('14:00'), new DateTime('19:00'), new DateTime('21:00'), false, false, $manager);
                $this->createPlanning('Mercredi', new DateTime('11:00'), new DateTime('14:00'), new DateTime('19:00'), new DateTime('21:00'), false, false, $manager);
                $this->createPlanning('Jeudi', new DateTime('11:00'), new DateTime('14:00'), new DateTime('19:00'), new DateTime('21:00'), false, false, $manager);
                $this->createPlanning('Vendredi', new DateTime('11:00'), new DateTime('14:00'), new DateTime('19:00'), new DateTime('21:00'), false, false, $manager);
                $this->createPlanning('Samedi', new DateTime('11:00'), new DateTime('14:00'), new DateTime('19:00'), new DateTime('21:00'), false, false, $manager);
                $this->createPlanning('Dimanche', new DateTime('11:00'), new DateTime('14:00'), new DateTime('19:00'), new DateTime('21:00'), false, false, $manager);
     
        

        
        $manager->flush();
    }

    public function createPlanning(string $day, DateTime $openAm, DateTime  $closeAm,  DateTime $openPm,  DateTime $closePm, bool $isClosedAm ,bool $isClosedPm ,ObjectManager $manager): Planning
    {
        $planning = new Planning();
        $planning->setDay($day);
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
