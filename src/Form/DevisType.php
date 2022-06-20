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
                'attr' => [
                    'placeholder' => 'ex: 5']
            ])
            ->add('voie', TextType::class, [
                 "label" => "Voie",
                 'attr' => [
                    'placeholder' => 'ex: Rue Jean Jaures, Bd Victor HUGOT...']
             ])
            ->add('codepostal', IntegerType::class, [
                "label" => "Code postal",
                'attr' => [
                    'placeholder' => 'ex: 78000']
            ])
            ->add('ville', TextType::class, [
                "label" => "Ville",
                'attr' => [
                    'placeholder' => 'ex: VERSAILLES']
            ])
            ->add('message', TextareaType::class, [
                "label" => "Message",
                'attr' => [
                    'placeholder' => 'Merci d\'indiquer le type d\'intervention.
                     Falcultativement la marque et la réfence du piano ']
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
