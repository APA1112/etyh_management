<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Factory\UserFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {  
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        UserFactory::createOne([
            'userName' => 'chuck',
            'password' =>  $this->passwordHasher->hashPassword(
                new User(),
                'norris'
            ),
            'admin' => false,
            'developer' => false
        ]);

        UserFactory::createOne([
            'userName' => 'admin',
            'password' =>  $this->passwordHasher->hashPassword(
                new User(),
                'admin'
            ),
            'admin' => true,
            'developer' => false
        ]);

        UserFactory::createOne([
            'userName' => 'developer',
            'password' =>  $this->passwordHasher->hashPassword(
                new User(),
                'developer'
            ),
            'admin' => false,
            'developer' => true
        ]);

        $manager->flush();
    }
}
