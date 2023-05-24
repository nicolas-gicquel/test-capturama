<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Faker;

class UserFixtures extends Fixture
{

    public function __construct(
        private UserPasswordHasherInterface $passwordEncoder,
    ){}


    public function load(ObjectManager $manager): void
    {
        
        
        $userAdmin = new User();
        $userAdmin->setFirstName('Antoine');
        $userAdmin->setLastName('Chauvel');

        $userAdmin->setEmail('admin@admin.fr');
        // Encodage du mot de passe
        $userAdmin->setPassword(
            $this->passwordEncoder->hashPassword($userAdmin, 'Capturama')
        );
        $userAdmin->setRoles(['ROLE_ADMIN']);

        $manager->persist($userAdmin);

        $manager->flush();
        
        $faker = Faker\Factory::create('fr_FR');

        for($usr = 1; $usr <= 5; $usr++){
            $user = new User();
            $user->setFirstname($faker->firstName);
            $user->setLastname($faker->lastName);
            $user->setEmail($faker->email);
            // Encodage du mot de passe
            $user->setPassword(
                $this->passwordEncoder->hashPassword($user, 'secret')
            );
            $manager->persist($user);
        }

        $manager->flush($user);
    }
}
