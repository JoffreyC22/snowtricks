<?php

namespace AppBundle\Service;

use Doctrine\ORM\EntityManagerInterface;

class TricksGetter
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function getAll()
    {
        $em = $this->em;
        $tricksRepository = $em->getRepository('AppBundle:Trick');
        $tricks = $tricksRepository->findAll();

        return $tricks;
    }

    public function getById($id)
    {
        $em = $this->em;
        $tricksRepository = $em->getRepository('AppBundle:Trick');
        $trick = $tricksRepository->find($id);

        return $trick;
    }
}