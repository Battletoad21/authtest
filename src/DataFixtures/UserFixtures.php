<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;

class UserFixtures extends Fixture
{

    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $user1 = new User();
        $user1->setIdentifiant('user1@mail.com');
        $user1->setNom('Dylan');
        $user1->setPrenom('Bob');
        $user1->setAdresse('Rue du test');
        $user1->setcodepostal('67100');
        $user1->setVille('Strasbourg');
        $user1->setPays('France');
        $user1->setRoles(['ROLE_User']);
        $user1->setPassword($this->passwordEncoder->encodePassword(
            $user1,
            '123456'
        ));

        $manager->persist($user1);

        $user2 = new User();
        $user2->setIdentifiant('user2@mail.com');
        $user2->setNom('Young');
        $user2->setPrenom('Neil');
        $user2->setAdresse('Rue du php');
        $user2->setcodepostal('67200');
        $user2->setVille('Strasbourg');
        $user2->setPays('France');
        $user2->setRoles(['ROLE_User']);
        $user2->setPassword($this->passwordEncoder->encodePassword(
            $user2,
            '123456'
        ));

        $manager->persist($user2);

        $user3 = new User();
        $user3->setIdentifiant('user3@mail.com');
        $user3->setNom('Collins');
        $user3->setPrenom('Phil');
        $user3->setAdresse('Rue du tarzan');
        $user3->setcodepostal('67666');
        $user3->setVille('Reichstett');
        $user3->setPays('France');
        $user3->setRoles(['ROLE_User']);
        $user3->setPassword($this->passwordEncoder->encodePassword(
            $user3,
            '123456'
        ));

        $manager->persist($user3);

        $manager->flush();
    }
}
