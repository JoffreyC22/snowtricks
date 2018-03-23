<?php

namespace AppBundle\Controller;

use AppBundle\Service\TricksGetter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Trick;
use AppBundle\Form\TrickType;
use Symfony\Component\HttpFoundation\Request;

class TricksController extends Controller
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

        return $this->render('@App/Tricks/add.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/tricks/{id}/edit", name="trickViewEdit")
     */
    public function editAction($id, TricksGetter $tricksGetter, Request $request)
    {
        $trick = $tricksGetter->getById($id);
        $form = $this->get('form.factory')->create(TrickType::class, $trick);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($trick);
                $em->flush();

                $request->getSession()->getFlashBag()->add('alert-success', 'Figure bien modifiée.');

                return $this->redirectToRoute('trickViewEdit', array('id' => $trick->getId()));
            }
        }

        return $this->render('@App/Tricks/edit.html.twig', array(
            'form' => $form->createView(),
        ));

    }

    /**
     * @Route("/tricks/{id}", name="trickViewShow")
     */
    public function showAction($id, TricksGetter $tricksGetter)
    {
        $trick = $tricksGetter->getById($id);

        return $this->render('@App/Tricks/show.html.twig', array(
            'trick' => $trick,
        ));

    }
}
