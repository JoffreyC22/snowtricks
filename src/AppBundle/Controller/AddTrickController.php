<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class AddTrickController extends Controller
{
    /**
     * @Route("/tricks/add", name="trickViewAdd")
     * @Method({"GET"})
     */
    public function viewAddAction()
    {
        return $this->render('@App/AddTrick/view_add.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/tricks/add", name="trickPostAdd")
     * @Method({"POST"})
     */
    public function postAddAction()
    {

    }

}
