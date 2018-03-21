<?php
// src/AppBundle/DataFixtures/ORM/LoadMedia.php

namespace AppBundle\DataFixtures\ORM;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use AppBundle\Entity\Media;

class LoadMedia extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        foreach ($this->getData() as $data) {
            $media = $this->getMedia($data);

            $manager->persist($media);
        }

        $manager->flush();
    }

    private function getMedia(array $data)
    {
        return (new Media())
            ->setUrl($data['url'])
            ->setType($data['type'])
            ->setTrick($this->getReference($data['trick']))
            ->setUser($this->getReference($data['user']));
    }

    private function getData()
    {

        $array = [];
        for ($i = 1; $i <= 10; $i++) {
            $array[] = [
                'url' => '/snowtricks/web/uploads/images/tricks/trick'.$i.'.jpg',
                'type' => 'image',
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