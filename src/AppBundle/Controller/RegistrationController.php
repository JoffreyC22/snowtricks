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
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegistrationController extends Controller
{
    /**
     * @Route("/register", name="registration")
     */
    public function registerAction(Request $request, UserPasswordEncoderInterface $passwordEncoder)
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

            MailSender::sendActivation($user->getEmail());

            $request->getSession()->getFlashBag()->add('alert-success', 'Votre compte a bien été crée.');

            return $this->redirectToRoute('home');
        }

        return $this->render('@App/Registration/register.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}