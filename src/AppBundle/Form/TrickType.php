<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use AppBundle\Entity\Category;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class TrickType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',      TextType::class, array(
                'label' => 'Nom',
                'required' => true
            ))
            ->add('description',     TextareaType::class, array(
                'required' => true
            ))
            ->add('category',   EntityType::class, array(
                'label' => 'Catégorie',
                'required' => true,
                'class' => Category::class,
                'choice_label' => 'name'
            ))
            ->add('medias',     MediaType::class, array(
                'required' => false,
                'data_class' => null
            ))
            ->add('save',      SubmitType::class, array(
                'label' => 'Enregistrer la figure',
                'attr' => array('class' => 'btn-primary')
            ));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Trick'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_trick';
    }


}
