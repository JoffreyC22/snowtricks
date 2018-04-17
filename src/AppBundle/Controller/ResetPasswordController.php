<?php

namespace AppBundle\Controller;

use AppBundle\Form\UserType;
use AppBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ResetPasswordController extends Controller
{
    /**
     * @Route("/reset-password", name="resetPassword")
     */
    public function resetpasswordAction(Request $request, UserPasswordEncoderInterface $encoder)
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




            $request->getSession()->getFlashBag()->add('alert-success', 'Votre compte a bien été crée.');
            return $this->redirectToRoute('home');
        }

        return $this->render('@App/Password/reset-password.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}