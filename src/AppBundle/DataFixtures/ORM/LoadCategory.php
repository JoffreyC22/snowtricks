<?php
// src/AppBundle/DataFixtures/ORM/LoadCategory.php

namespace AppBundle\DataFixtures\ORM;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use AppBundle\Entity\Category;

class LoadCategory extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        foreach ($this->getData() as $data) {
            $category = $this->getCategory($data);

            $this->addReference($data['reference'], $category);

            $manager->persist($category);
        }

        $manager->flush();
    }

    private function getCategory(array $data)
    {
            return (new Category())
            ->setName($data['name']);
    }

    private function getData()
    {
        return
            [
                [
                    'reference' => 'grabs',
                    'name' => 'Grabs',
                ],
                [
                    'reference' => 'rotations-a-plat',
                    'name' => 'Rotations à plat',
                ],
                [
                    'reference' => 'rotations-en-bas',
                    'name' => 'Rotations tête en bas',
                ],
                [
                    'reference' => 'switches',
                    'name' => 'Switches',
                ],
                [
                    'reference' => 'autres',
                    'name' => 'Autres',
                ],
            ];
    }

    public function getOrder()
    {
        return 2;
    }
}