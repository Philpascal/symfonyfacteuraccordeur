<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class PassType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
    $builder
        ->add('oldPassword', PasswordType::class, [
            'mapped' => false,
            'label' => 'Mot de passe actuel',
            'attr' => ['autocomplet' => 'email'],
            'constraints' => [
                new NotBlank([
                    'message' => 'Mot de passe actuel',
                ]),
            ],
        ])
        ->add('plainPassword', RepeatedType::class,[
            'mapped' => false,
            'type' => PasswordType::class,
            'first_options' => [
                'attr' => ['autocomplete' => 'new-password'],
                'label' => 'Nouveau mot de passe',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Entrer un nouveau mot de passe',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Votre mot de passe doit contenir au {{ limit }} caractères',
                        //max lenght allowed by Symfony for securityreasons
                        'max' => 4096,
                    ]),
                ],
            ],
            'second_options' => [
                'attr' => ['autocomplete' => 'new-password'],
                'label' => 'Répéter le noveau mot de passe',
            ],
            'invalid_message' => 'Vous n\'avez pas tapé 2 fois le même mot de passe',
        ])
        ->add('valider', SubmitType::class,[
            'label' => 'Modifier',
        ]);
    }
}
