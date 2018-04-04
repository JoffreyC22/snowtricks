<?php

namespace AppBundle\Controller;

use AppBundle\Service\TricksGetter;
use AppBundle\Service\UsersGetter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use AppBundle\Entity\Trick;
use AppBundle\Entity\Media;
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

            $files = $request->files->get('appbundle_trick')['medias'];
            foreach ($files as $key => $file) {
                $filename = $fileUploader->upload($file['file']);
                $media = new Media();
                $media->setUrl($filename);
                $media->setType('image');
                $media->setUser($usersGetter->getByUsername('joffreyc')); /** For now **/
                $trick->addMedia($media);
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
    public function editAction($slug, TricksGetter $tricksGetter, Request $request)
    {
        $trick = $tricksGetter->getBySlug($slug);
        if (null === $trick) {
            throw new NotFoundHttpException("Ce trick n'existe pas.");
        }
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
}
