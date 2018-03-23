<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Trick;
use AppBundle\Form\TrickType;
use Symfony\Component\HttpFoundation\Request;

class AddTrickController extends Controller
{
    /**
     * @Route("/tricks/add", name="trickViewAdd")
     */

    public function addAction(Request $request)
    {
        $trick = new Trick();
        $form = $this->get('form.factory')->create(TrickType::class, $trick);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($trick);
                $em->flush();

                $request->getSession()->getFlashBag()->add('alert-success', 'Figure bien enregistrée.');

                return $this->redirectToRoute('trickViewAdd');
            }
        }

        return $this->render('@App/AddTrick/view_add.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
