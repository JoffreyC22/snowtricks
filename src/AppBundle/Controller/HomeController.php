<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Service\TricksGetter;

class HomeController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction(TricksGetter $tricksGetter)
    {
        $tricks = $tricksGetter->getAll();

        return $this->render('@App/Home/index.html.twig', array(
            'tricks' => $tricks
        ));
    }

}
