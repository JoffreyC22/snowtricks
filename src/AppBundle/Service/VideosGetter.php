<?php

namespace AppBundle\Service;

use Doctrine\ORM\EntityManagerInterface;

class VideosGetter
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function getById($id)
    {
        $em = $this->em;
        $videosRepository = $em->getRepository('AppBundle:Video');
        $video = $videosRepository->find($id);

        return $video;
    }
}