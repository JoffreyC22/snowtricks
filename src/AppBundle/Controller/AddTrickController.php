<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use AppBundle\Entity\Trick;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

class AddTrickController extends Controller
{
    /**
     * @Route("/tricks/add", name="trickViewAdd")
     * @Method({"GET"})
     */
    public function addAction(Request $request)
    {
        $trick = new Trick();

        $form = $this->get('form.factory')->createBuilder(FormType::class, $trick)
            ->add('name',      TextType::class)
            ->add('description',     TextType::class)
            ->add('category',   ChoiceType::class)
            ->add('save',      SubmitType::class)
            ->getForm()
        ;

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($trick);
                $em->flush();

                $request->getSession()->getFlashBag()->add('notice', 'Figure bien enregistrée.');

                return $this->redirectToRoute('home');
            }
        }

        return $this->render('@App/AddTrick/view_add.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
