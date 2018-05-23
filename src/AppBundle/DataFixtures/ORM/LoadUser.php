<?php
// src/AppBundle/DataFixtures/ORM/LoadCategory.php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use AppBundle\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class LoadUser extends Fixture implements OrderedFixtureInterface
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setLastname('Capitaine');
        $user->setFirstname('Joffrey');
        $user->setEmail('joffrey@yeswedev.fr');
        $password = $this->encoder->encodePassword($user, 'secret');
        $user->setPhoto('default-profile.png');
        $user->setPassword($password);
        $user->setUsername('joffreyc');
        $user->setSalt(null);
        $user->setRoles(array('ROLE_USER'));
        $user->setIsActive(false);
        $user->setTokenActivation(bin2hex(random_bytes(20)));

        $this->addReference('joffrey', $user);

        $manager->persist($user);
        $manager->flush();
    }

    public function getOrder()
    {
        return 1;
    }
}