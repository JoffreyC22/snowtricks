<?php

// src/AppBundle/Form/UserType.php
namespace AppBundle\Form;

use AppBundle\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', TextType::class, array('label'=>'Prénom', 'required' => true))
            ->add('lastname', TextType::class, array('label'=>'Nom', 'required' => true))
            ->add('photo', FileType::class, array('label' =>'Photo (JPG ou PNG)', 'required' => false, 'data_class' => null))
            ->add('email', EmailType::class, array('required' => true))
            ->add('username', TextType::class, array('label' => 'Pseudo', 'required' => true))
            ->add('plainPassword', RepeatedType::class, array(
                'type' => PasswordType::class,
                'first_options'  => array('label' => 'Mot de passe'),
                'second_options' => array('label' => 'Confirmez le mot de passe'),
                'required' => true
            ))
            ->add('save', SubmitType::class, array(
                'label' => 'Confirmer',
                'attr' => array('class' => 'btn-primary')
            ));
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => User::class,
        ));
    }
}