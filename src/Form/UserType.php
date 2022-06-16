<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

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
                // 'expanded' => false,
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
            // ->add('password')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
