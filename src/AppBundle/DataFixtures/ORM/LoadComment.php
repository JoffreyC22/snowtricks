<?php
// src/AppBundle/DataFixtures/ORM/LoadComment.php

namespace AppBundle\DataFixtures\ORM;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use AppBundle\Entity\Comment;

class LoadComment extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        foreach ($this->getData() as $data) {
            $comment = $this->getComment($data);

            $manager->persist($comment);
        }

        $manager->flush();
    }

    private function getComment(array $data)
    {
        return (new Comment())
            ->setContent($data['content'])
            ->setTrick($this->getReference($data['trick']))
            ->setUser($this->getReference($data['user']))
            ->setCreated(new \DateTime('now'))
            ->setUpdated(new \DateTime(('now')));
    }

    private function getData()
    {

        $array = [];
        for ($i = 1; $i <= 10; $i++) {
            $array[] = [
                'content' => 'Bonjour, je suis le commentaire numéro '.$i,
                'trick' => 'trick'.$i,
                'user' => 'joffrey'
            ];
        }

        return $array;
    }

    public function getOrder()
    {
        return 5;
    }
}