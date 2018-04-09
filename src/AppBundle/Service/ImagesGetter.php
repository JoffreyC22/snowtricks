<?php

namespace AppBundle\Service;

use Doctrine\ORM\EntityManagerInterface;

class ImagesGetter
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function getById($id)
    {
        $em = $this->em;
        $imagesRepository = $em->getRepository('AppBundle:Image');
        $image = $imagesRepository->find($id);

        return $image;
    }
}