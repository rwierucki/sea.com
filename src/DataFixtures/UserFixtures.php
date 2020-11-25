<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        
        $user->setEmail('rw@sea.com');
        $user->setPassword($this->passwordEncoder->encodePassword($user,'rw'));
        $user->setRoles(['ROLE_ADMIN']);
        $manager->persist($user);
        $manager->flush();

        $user2 = new User();
        $user2->setEmail('user@sea.com');
        $user2->setPassword($this->passwordEncoder->encodePassword($user2,'user'));
        $user2->setRoles(['ROLE_USER']);
        $manager->persist($user2);
        $manager->flush();

        $user3 = new User();
        $user3->setEmail('mod@sea.com');
        $user3->setPassword($this->passwordEncoder->encodePassword($user3,'mod'));
        $user3->setRoles(['ROLE_MOD']);
        $manager->persist($user3);
        $manager->flush();
    }
}
