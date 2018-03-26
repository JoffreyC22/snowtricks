<?php

namespace AppBundle\Service;

use Doctrine\ORM\EntityManagerInterface;

class UsersGetter
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function getAll()
    {
        $em = $this->em;
        $usersRepository = $em->getRepository('AppBundle:User');
        $users = $usersRepository->findAll();

        return $users;
    }

    public function getById($id)
    {
        $em = $this->em;
        $usersRepository = $em->getRepository('AppBundle:User');
        $user = $usersRepository->find($id);

        return $user;
    }

    public function getByUsername($username)
    {
        $em = $this->em;
        $usersRepository = $em->getRepository('AppBundle:User');
        $user = $usersRepository->findOneBy(array(
            'username' => $username
        ));

        return $user;
    }
}