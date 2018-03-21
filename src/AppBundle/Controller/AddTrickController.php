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

class AddTrickController extends Controller
{
    /**
     * @Route("/tricks/add", name="trickViewAdd")
     * @Method({"GET"})
     */
    public function viewAddAction()
    {
        // On crée un objet Trick
        $trick = new Trick();

        // On crée le FormBuilder grâce au service form factory
        $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $trick);

        // On ajoute les champs de l'entité que l'on veut à notre formulaire
        $formBuilder
            ->add('name',      TextType::class)
            ->add('description',     TextType::class)
            ->add('category',   ChoiceType::class)
            ->add('save',      SubmitType::class)
        ;

        // À partir du formBuilder, on génère le formulaire
        $form = $formBuilder->getForm();

        // On passe la méthode createView() du formulaire à la vue
        // afin qu'elle puisse afficher le formulaire toute seule
        return $this->render('@App/AddTrick/view_add.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/tricks/add", name="trickPostAdd")
     * @Method({"POST"})
     */
    public function postAddAction()
    {

    }

}
