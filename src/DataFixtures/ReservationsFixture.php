<?php

namespace App\DataFixtures;

use App\Entity\Reservations;
use App\Entity\Users;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker;

class ReservationsFixture extends Fixture 
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        $users = $manager->getRepository(Users::class)->findBy( [], ['id' => 'ASC']);
        for ($i = 0; $i < 5; $i++) {
            $reservation = new Reservations();
            $reservation->setDate($faker->dateTimeBetween('+0 days', '+1 years'));
        $reservation->setHour($faker->dateTime('H:i:s'));
            $reservation->setNbOfPersons($faker->numberBetween(1, 10));
            $reservation->setLastname($faker->lastName);
            $reservation->setFirstname($faker->firstName);
            $reservation->setEmail($faker->email);
            $manager->persist($reservation);
        }
        for($i = 0; $i < 10; $i++){
            
            $reservation = new Reservations();
            $reservation->setDate($faker->dateTimeBetween('+0 days', '+1 years'));
            $reservation->setHour($faker->dateTime('H:i:s'));
            $reservation->setNbOfPersons($faker->numberBetween(1, 10));
            $reservation->setUser($faker->randomElement($users));
            $reservation->setLastname($faker->lastName);
            $reservation->setFirstname($faker->firstName);
            $reservation->setEmail($faker->email);
            
            $manager->persist($reservation);
        }

        $manager->flush();
    }

    
}
