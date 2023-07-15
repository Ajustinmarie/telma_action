<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class FormPassUserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('firstname', TextType::class,[
            'label'=>'Mon prénom',
            'disabled'=>true
        ] )

        ->add('name', TextType::class,[
            'label'=>'Mon nom',
             'disabled'=>true
        ] )


        ->add('email', EmailType::class,[
            'label'=>'Votre email',
            'disabled'=>true,
        ] )

        ->add('old_password', PasswordType::class,[
            'label'=>'Mon mot de passe actuel',
            'mapped'=>false,
            'attr'=>[
                'placeholder'=>'Veuillez saisir votre mot de passe actuel'
            ]
        ])


        ->add('new_password', RepeatedType::class,[
            'type'=>PasswordType::class,
             'mapped'=>false,
            'invalid_message'=>'Le mot de passe et la confirmation doivent etre identique',
            'label'=>'Mon nouveau mot de passe',
            'required'=>true,
            'first_options' =>[
                'label'=>'Mot de passe',
                'attr'=>[
                'placeholder' =>'Mon nouveau mot de passe'
                ]
            ],
            'second_options'=>[
            'label'=>'Confirmez votre nouveau mot de passe',
            'attr'=>[
                'placeholder' =>'Merci de saisir votre nouveau mot de passe'
               ]
            ]

            ])



                  
             ->add('submit', SubmitType::class,[
                'label'=>"Mettre a jour"
             ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
