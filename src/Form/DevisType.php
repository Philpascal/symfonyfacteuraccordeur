<?php

namespace App\Form;

use App\Entity\Devis;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class DevisType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            
            ->add('numero', IntegerType::class, [
                "label" => "N°",
            ])
            ->add('rue', TextType::class, [
                 "label" => "Rue",
             ])
            ->add('codepostal', IntegerType::class, [
                "label" => "Code postal",
            ])
            ->add('ville', TextType::class, [
                "label" => "Ville",
            ])
            ->add('message', TextareaType::class, [
                "label" => "Message",
            ])
            ->add('photo', TextType::class, [
                "label" => "Photo",
            ])
            ->add('Valider', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Devis::class,
        ]);
    }
}
