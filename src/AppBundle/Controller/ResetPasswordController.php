<?php

namespace AppBundle\Controller;

use AppBundle\Service\UsersGetter;
use AppBundle\Service\MailSender;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class ResetPasswordController extends Controller
{
    /**
     * @Route("/reset-password", name="resetPassword")
     */
    public function resetpasswordAction(Request $request, UsersGetter $usersGetter, MailSender $mailSender)
    {
        $formBuilder = $this->get('form.factory')->createBuilder();

        $formBuilder
            ->add('username', TextType::class, array(
                'label' => 'Pseudo',
                'required' => true
            ))
            ->add('save', SubmitType::class, array(
                'label' => 'Envoyer le mot de passe',
                'attr' => array('class' => 'btn-primary')
            ));
        ;

        $form = $formBuilder->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $data = $request->request->get('form');
            $username = $data['username'];
            $user = $usersGetter->getByUsername($username);

            if (null === $user) {
                throw new NotFoundHttpException("Cet utilisateur n\'existe pas");
            }

            $now = new \DateTime();
            $expiracy = $now->modify('+1 day');

            $user->setTokenResetPassword(bin2hex(random_bytes(20)));
            $user->setDateResetPassword($expiracy);

            $mailSender->sendResetPassword($user->getEmail(), $usersGetter);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            $request->getSession()->getFlashBag()->add('alert-success', 'Un e-mail vous a été envoyé');
            return $this->redirectToRoute('login');
        }

        return $this->render('@App/Password/reset-password.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/reset-password/{token}", name="reset")
     */
    public function resetAction($token, Request $request, UsersGetter $usersGetter, UserPasswordEncoderInterface $encoder)
    {
        $user = $usersGetter->getByTokenResetPassword($token);
        $now = new \DateTime();
        $expiracy = $user->getDateResetPassword();

        if (null === $user || $now > $expiracy) {
            throw new NotFoundHttpException("Une erreur est survenue, veuillez contacter le webmaster");
        }

        $formBuilder = $this->get('form.factory')->createBuilder();

        $formBuilder
            ->add('plainPassword', RepeatedType::class, array(
                'type' => PasswordType::class,
                'first_options'  => array('label' => 'Nouveau mot de passe'),
                'second_options' => array('label' => 'Confirmez le mot de passe'),
                'required' => true,
                'invalid_message' => 'Les mots de passe ne correspondent pas',
            ))
            ->add('save', SubmitType::class, array(
                'label' => 'Confirmer',
                'attr' => array('class' => 'btn-primary')
            ));
        ;

        $form = $formBuilder->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $data = $request->request->get('form');
            $new_password = $data['plainPassword']['first'];

            $password = $encoder->encodePassword($user, $new_password);
            $user->setPassword($password);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            $request->getSession()->getFlashBag()->add('alert-success', 'Votre mot de passe a bien été changé');
            return $this->redirectToRoute('login');
        }

        return $this->render('@App/Password/new-password.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}