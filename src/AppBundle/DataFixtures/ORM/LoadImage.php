<?php
// src/AppBundle/DataFixtures/ORM/LoadImage.php

namespace AppBundle\DataFixtures\ORM;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use AppBundle\Entity\Image;

class LoadImage extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        foreach ($this->getData() as $data) {
            $media = $this->getImage($data);

            $manager->persist($media);
        }

        $manager->flush();
    }

    private function getImage(array $data)
    {
        return (new Image())
            ->setUrl($data['url'])
            ->setTrick($this->getReference($data['trick']))
            ->setUser($this->getReference($data['user']));
    }

    private function getData()
    {

        $array = [];
        for ($i = 1; $i <= 10; $i++) {
            $array[] = [
                'url' => 'trick'.$i.'.jpg',
                'trick' => 'trick'.$i,
                'user' => 'joffrey'
            ];
        }

        return $array;
    }

    public function getOrder()
    {
        return 4;
    }
}