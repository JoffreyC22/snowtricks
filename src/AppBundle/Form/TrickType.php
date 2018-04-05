<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use AppBundle\Entity\Category;
use AppBundle\Entity\Trick;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class TrickType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, array(
                'label' => 'Nom',
                'required' => true
            ))
            ->add('description', TextareaType::class, array(
                'required' => true
            ))
            ->add('category', EntityType::class, array(
                'label' => 'Catégorie',
                'required' => true,
                'class' => Category::class,
                'choice_label' => 'name'
            ))
            ->add('images', CollectionType::class, array(
                'entry_type' => ImageType::class,
                'prototype' => true,
                'allow_add' => true,
                'mapped' => false,
                'label' => false
            ))
            ->add('videos', CollectionType::class, array(
                'entry_type' => VideoType::class,
                'prototype' => true,
                'allow_add' => true,
                'mapped' => false,
                'label' => false
            ))
            ->add('save', SubmitType::class, array(
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
            'data_class' => Trick::class
        ));
    }
}
