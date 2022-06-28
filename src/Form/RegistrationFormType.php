<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', TextType::class, [
                'attr' => [
                    'placeholder' => 'ex: antoine.berthier@free.fr'
                ]])
            ->add('nom', TextType::class, [
                'attr' => [
                    'placeholder' => 'ex: BERTHIER',
                    'class' => 'text-uppercase'
                ]])
            ->add('prenom', TextType::class, [
                'attr' => [
                    'placeholder' => 'ex: Antoine',
                    'class' => 'text-capitalize'
                ]])
            ->add('tel', TextType::class, [
                'attr' => [
                    'placeholder' => 'ex: 0611223344',
                    // 'class' => 'number',
                    'maxlength' => 10,
                ],
                'constraints' => [
                    new Length([
                        'min' => 10,
                        'max' => 10,
                    ]),
                ],
                ])
            ->add('agreeTerms', CheckboxType::class, [
                "label" => "Accepter les conditions",
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'You should agree to our terms.',
                    ]),
                ],
            ])
            
            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
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