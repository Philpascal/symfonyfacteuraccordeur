<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('Roles', ChoiceType::class, [
                'required' => true,
                'multiple' => true,
                'choices'  => [
                'profile' => 'ROLE_USER',
                'admin' => 'ROLE_ADMIN',
                'boss' => 'ROLE_BOSS',
                ],
            ])
            ->add('tel')
            ->add('email')
            ->add('isVerified', CheckboxType::class, [
                "label" => "Cocher la case pour autoriser l'accès",
                "required"=>false,
            ])
            ->add('plainPassword', RepeatedType::class,[
                'mapped' => false,
                'required' => false,
                'type' => PasswordType::class,
                'first_options' => [
                    'attr' => ['autocomplete' => 'new-password'],
                    'label' => 'Nouveau mot de passe',
                    'constraints' => [
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
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
