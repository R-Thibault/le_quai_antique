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
        $users = $manager->getRepository(Users::class)->findBy([], ['id' => 'ASC']);
        
        for ($i = 0; $i < 30; $i++) {
            $reservation = new Reservations();
            $reservation->setDateTime($faker->dateTimeBetween('now', '+5 days'));
            $reservation->setNbOfPersons($faker->numberBetween(1, 10));
            $reservation->setLastname($faker->lastName());  // Use method call
            $reservation->setFirstname($faker->firstName());  // Use method call
            $reservation->setEmail($faker->email());  // Use method call
            $reservation->setAmOrPm('pm');
            $manager->persist($reservation);
        }
        
        for ($i = 0; $i < 30; $i++) {
            $reservation = new Reservations();
            $reservation->setDateTime($faker->dateTimeBetween('now', '+5 days'));
            $reservation->setNbOfPersons($faker->numberBetween(1, 10));
            $reservation->setUser($faker->randomElement($users));
            $reservation->setLastname($faker->lastName());  // Use method call
            $reservation->setFirstname($faker->firstName());  // Use method call
            $reservation->setEmail($faker->email());  // Use method call
            $reservation->setAmOrPm('pm');
            $manager->persist($reservation);
        }

        $manager->flush();
    }
}
