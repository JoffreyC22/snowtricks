<?php
// src/AppBundle/DataFixtures/ORM/LoadCategory.php

namespace AppBundle\DataFixtures\ORM;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use AppBundle\Entity\User;

class LoadUser extends Fixture implements OrderedFixtureInterface
{
    // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setLastname('Capitaine');
        $user->setFirstname('Joffrey');
        $user->setEmail('joffrey@yeswedev.fr');
        $user->setPassword(sha1('secret'));
        $user->setUsername('joffreyc');
        $manager->persist($user);
        $manager->flush();
    }

    public function getOrder()
    {
        return 1;
    }
}