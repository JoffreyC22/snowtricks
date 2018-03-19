<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class HomeController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $tricksRepository = $em->getRepository('AppBundle:Trick');
        $tricks = $tricksRepository->findAll();

        return $this->render('@App/Home/index.html.twig', array(
            'tricks' => $tricks
        ));
    }

}
