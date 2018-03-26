<?php

namespace AppBundle\Controller;

use AppBundle\Service\TricksGetter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Trick;
use AppBundle\Entity\Comment;
use AppBundle\Form\TrickType;
use AppBundle\Form\CommentType;
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
     * @Route("/tricks/{slug}/edit", name="trickViewEdit")
     */
    public function editAction($slug, TricksGetter $tricksGetter, Request $request)
    {
        $trick = $tricksGetter->getBySlug($slug);
        $form = $this->get('form.factory')->create(TrickType::class, $trick);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($trick);
                $em->flush();

                $request->getSession()->getFlashBag()->add('alert-success', 'Figure bien modifiée.');

                return $this->redirectToRoute('trickViewEdit', array('slug' => $trick->getSlug()));
            }
        }

        return $this->render('@App/Tricks/edit.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/tricks/{slug}", name="trickViewShow")
     */
    public function showAction($slug, TricksGetter $tricksGetter, Request $request)
    {
        $trick = $tricksGetter->getBySlug($slug);
        $comment = new Comment();
        $form = $this->get('form.factory')->create(CommentType::class, $comment);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($comment);
                $em->flush();

                $request->getSession()->getFlashBag()->add('alert-success', 'Commentaire bien enregistré.');

                return $this->redirectToRoute('trickViewShow', array('slug' => $slug));
            }
        }

        return $this->render('@App/Tricks/show.html.twig', array(
            'trick' => $trick,
            'form' => $form->createView()
        ));

    }
}
