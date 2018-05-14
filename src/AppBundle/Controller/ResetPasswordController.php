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

class ResetPasswordController extends Controller
{
    /**
     * @Route("/reset-password", name="resetPassword")
     */
    public function resetpasswordAction(Request $request, UserPasswordEncoderInterface $encoder, UsersGetter $usersGetter, MailSender $mailSender)
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

            if (null === $username) {
                throw new NotFoundHttpException("Cet utilisateur n\'existe pas.");
            }

            $user = $usersGetter->getByUsername($username);

            $user->setTokenResetPassword(bin2hex(random_bytes(20)));

            $mailSender->sendResetPassword($user->getEmail(), $usersGetter);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            $request->getSession()->getFlashBag()->add('alert-success', 'Un nouveau mot de passe vous a été envoyé');
            return $this->redirectToRoute('login');
        }

        return $this->render('@App/Password/reset-password.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}