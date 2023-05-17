<?php

namespace App\DataFixtures;

use App\Entity\Reservations;
use App\Entity\Users;
use App\Repository\UsersRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker;

class ReservationsFixture extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
       $faker = Faker\Factory::create('fr_FR');
         $users = $manager->getRepository(Users::class)->findAll();

       for($res = 1; $res <= 5; $res++){
           $reservations = new Reservations();
           $reservations->setBookingDate($faker->dateTimeBetween('-1 years', 'now'));
           $reservations->setNbOfPersons($faker->numberBetween(1, 8));
           $reservations->setAllergies($faker->text(7));
           $reservations->setFirstname($faker->firstName());
           $reservations->setLastname($faker->lastName());  
           $reservations->setEmail($faker->email());
           
           $reservations->setComments($faker->paragraph(2));
           $reservations->setHour($faker->dateTimeBetween('11:00', '22:00'));
           $manager->persist($reservations);
       }
       for($res = 1; $res <= 5; $res++){
        $reservations = new Reservations();
        $reservations->setBookingDate($faker->dateTimeBetween('-1 years', 'now'));
        $reservations->setNbOfPersons($faker->numberBetween(1, 8));
        $reservations->setAllergies($faker->text(7));
        
        $reservations->setUser($faker->randomElement($users));
        $reservations->setComments($faker->paragraph(2));
        $reservations->setHour($faker->dateTimeBetween('11:00', '22:00'));
        $manager->persist($reservations);
    }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            UsersFixtures::class,
        ];
    }
}
