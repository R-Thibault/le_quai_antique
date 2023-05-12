<?php

namespace App\DataFixtures;

use App\Entity\Users;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\String\Slugger\SluggerInterface;
use Faker;

class UsersFixtures extends Fixture
{
    public function __construct(private UserPasswordHasherInterface $passwordHasher,
    private SluggerInterface $slugger)
    {
    }

    public function load(ObjectManager $manager): void
    {
       $admin = new Users();
         $admin->setEmail('admin@demo.com');
         $admin->setLastname('Admin');
         $admin->setFirstname('Admin');
         $admin->setRoles(['ROLE_ADMIN']);
        
         $admin->setPassword($this->passwordHasher->hashPassword($admin, 'adminstudi'));

         $manager->persist($admin);

         $faker = Faker\Factory::create('fr_FR');

        for($usr = 1; $usr <=6; $usr++){
            $user = new Users();
            $user->setEmail($faker->email());
            $user->setLastname($faker->lastName());
            $user->setFirstname($faker->firstName());
            $user->setNbOfPersons($faker->numberBetween(1, 10));
            $user->setAllergies($faker->text(7));
            
            $user->setPassword($this->passwordHasher->hashPassword($user, 'secret'));

            $manager->persist($user);
        }

        $manager->flush();
    }
}
