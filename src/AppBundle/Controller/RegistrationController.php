<?php

// src/AppBundle/Controller/RegistrationController.php
namespace AppBundle\Controller;

use AppBundle\Service\MailSender;
use AppBundle\Form\UserType;
use AppBundle\Entity\User;
use AppBundle\Service\UsersGetter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegistrationController extends Controller
{
    /**
     * @Route("/register", name="registration")
     */
    public function registerAction(Request $request, UserPasswordEncoderInterface $passwordEncoder, UsersGetter $usersGetter, MailSender $mailSender)
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $file = $user->getPhoto();
            if ($file) {
                $fileName = md5(uniqid()) . '.' . $file->guessExtension();
                $file->move($this->container->getParameter('profil_pictures_directory'), $fileName);
                $user->setPhoto($fileName);
            } else {
                $user->setPhoto('default-profile.png');
            }

            $password = $passwordEncoder->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            $mailSender->sendActivation($user->getEmail(), $usersGetter);

            $request->getSession()->getFlashBag()->add('alert-success', 'Votre compte a bien été crée.');

            return $this->redirectToRoute('home');
        }

        return $this->render('@App/Registration/register.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/activate/{token}", name="activation")
     */
    public function activateAction($token, Request $request, UsersGetter $usersGetter)
    {
        $user = $usersGetter->getByToken($token);
        if (null === $user || $user->isEnabled()) {
            throw new NotFoundHttpException("Une erreur est survenue, veuillez contacter le webmaster.");
        }

        $user->setIsActive(true);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($user);
        $entityManager->flush();

        $request->getSession()->getFlashBag()->add('alert-success', 'Votre compte a bien été activé.');

        return $this->redirectToRoute('login');
    }
}