<?php
// src/AppBundle/DataFixtures/ORM/LoadTrick.php

namespace AppBundle\DataFixtures\ORM;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use AppBundle\Entity\Trick;

class LoadTrick extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        foreach ($this->getData() as $data) {
            $trick = $this->getTrick($data);

            $manager->persist($trick);
        }

        $manager->flush();
    }

    private function getTrick(array $data)
    {
        return (new Trick())
            ->setName($data['name'])
            ->setDescription($data['description'])
            ->setCategory($this->getReference($data['category']));
    }

    private function randomizeCats() {
        $cats = ['grabs', 'rotations-a-plat', 'rotations-en-bas', 'switches', 'autres'];

        return $cats[array_rand($cats)];
    }

    private function getData()
    {

        $array = [];
        for ($i = 1; $i <= 10; $i++) {
            $array[] = [
                'name' => 'Trick'.$i,
                'description' => 'Trick '.$i.' : Lorem ipsum dolor sit amet.',
                'category' => $this->randomizeCats()
            ];
        }

        return $array;
    }

    public function getOrder()
    {
        return 3;
    }
}