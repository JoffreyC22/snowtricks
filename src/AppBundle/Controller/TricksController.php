<?php

namespace AppBundle\Controller;

use AppBundle\Service\TricksGetter;
use AppBundle\Service\UsersGetter;
use AppBundle\Service\ImagesGetter;
use AppBundle\Service\VideosGetter;
use AppBundle\Service\HandleMedias;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use AppBundle\Entity\Trick;
use AppBundle\Entity\Comment;
use AppBundle\Form\TrickType;
use AppBundle\Form\CommentType;
use AppBundle\Service\FileUploader;
use Symfony\Component\HttpFoundation\Request;

class TricksController extends Controller
{
    /**
     * @Route("/tricks/add", name="trickViewAdd")
     */
    public function addAction(Request $request, FileUploader $fileUploader, UsersGetter $usersGetter)
    {
        $trick = new Trick();
        $form = $this->get('form.factory')->create(TrickType::class, $trick);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            if (isset($request->request->get('trick')['videos'])) { /* Traitement videos */
                $handle = HandleMedias::handleVideos($request, $usersGetter, $trick);
                if (!$handle) {
                    $request->getSession()->getFlashBag()->add('alert-danger', 'Le lien de la vidéo n\'est pas valide.');
                    return $this->redirectToRoute('trickViewAdd');
                }
            }
            if (isset($request->files->get('trick')['images'])) { /* Traitement images */
                $handle = HandleMedias::handleImages($request, $usersGetter, $fileUploader, $trick);
                if (!$handle) {
                    $request->getSession()->getFlashBag()->add('alert-danger', 'Le fichier doit être de type : jpg, jpeg ou png.');
                    return $this->redirectToRoute('trickViewAdd');
                }
            }

            $em = $this->getDoctrine()->getManager();
            $em->persist($trick);
            $em->flush();

            $request->getSession()->getFlashBag()->add('alert-success', 'Figure bien enregistrée.');

            return $this->redirectToRoute('trickViewAdd');
        }

        return $this->render('@App/Tricks/add.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/tricks/{slug}/edit", name="trickViewEdit")
     */
    public function editAction($slug, TricksGetter $tricksGetter, FileUploader $fileUploader, UsersGetter $usersGetter, Request $request)
    {
        $trick = $tricksGetter->getBySlug($slug);
        if (null === $trick) {
            throw new NotFoundHttpException("Ce trick n'existe pas.");
        }
        $form = $this->get('form.factory')->create(TrickType::class, $trick);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            if (isset($request->request->get('trick')['videos'])) { /* Traitement videos */
                $handle = HandleMedias::handleVideos($request, $usersGetter, $trick);
                if (!$handle) {
                    $request->getSession()->getFlashBag()->add('alert-danger', 'Le lien de la vidéo n\'est pas valide.');
                    return $this->redirectToRoute('trickViewEdit', array('slug' => $trick->getSlug()));
                }
            }
            if (isset($request->files->get('trick')['images'])) { /* Traitement images */
                $handle = HandleMedias::handleImages($request, $usersGetter, $fileUploader, $trick);
                if (!$handle) {
                    $request->getSession()->getFlashBag()->add('alert-danger', 'Le fichier doit être de type : jpg, jpeg ou png.');
                    return $this->redirectToRoute('trickViewEdit', array('slug' => $trick->getSlug()));
                }
            }

            $em = $this->getDoctrine()->getManager();
            $em->persist($trick);
            $em->flush();

            $request->getSession()->getFlashBag()->add('alert-success', 'Figure bien modifiée.');

            return $this->redirectToRoute('trickViewEdit', array('slug' => $trick->getSlug()));
        }

        return $this->render('@App/Tricks/edit.html.twig', array(
            'form' => $form->createView(),
            'trick' => $trick
        ));
    }

    /**
     * @Route("/tricks/{slug}", name="trickViewShow")
     */
    public function showAction($slug, TricksGetter $tricksGetter, UsersGetter $usersGetter, Request $request)
    {
        $trick = $tricksGetter->getBySlug($slug);
        if (null === $trick) {
            throw new NotFoundHttpException("Ce trick n'existe pas.");
        }
        $comment = new Comment();
        $form = $this->get('form.factory')->create(CommentType::class, $comment);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);

            if ($form->isValid()) {
                $comment->setUser($usersGetter->getByUsername('joffreyc')); /* A remplacer quand le module d'auth sera fait **/
                $comment->setTrick($trick);
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

    /**
     * @Route("/tricks/{slug}/delete", name="trickDelete")
     */
    public function deleteAction($slug, TricksGetter $tricksGetter, Request $request)
    {
        $trick = $tricksGetter->getBySlug($slug);
        if (null === $trick) {
            throw new NotFoundHttpException("Ce trick n'existe pas.");
        }

        $em = $this->getDoctrine()->getManager();
        $em->remove($trick);
        $em->flush();

        $request->getSession()->getFlashBag()->add('alert-success', 'Trick bien supprimé.');

        return $this->redirectToRoute('home');
    }

    /**
     * @Route("/tricks/{slug}/medias/{type}/{media_id}/delete", name="mediaDelete")
     */
    public function deleteMediaAction($slug, $type, $media_id, imagesGetter $imagesGetter, videosGetter $videosGetter, TricksGetter $tricksGetter, Request $request)
    {
        $trick = $tricksGetter->getBySlug($slug);
        if ($type == 'image') {
            $media = $imagesGetter->getById($media_id);
        } else {
            $media = $videosGetter->getById($media_id);
        }

        if (null === $trick || null === $media) {
            throw new NotFoundHttpException("Ce trick/ce média n'existe pas.");
        }

        call_user_func_array(array($trick, 'remove'.ucfirst($type)), array($media));

        $em = $this->getDoctrine()->getManager();
        $em->remove($media);
        $em->flush();

        $request->getSession()->getFlashBag()->add('alert-success', 'Média bien supprimé.');

        return $this->redirectToRoute('trickViewEdit', array('slug' => $trick->getSlug()));
    }
}
