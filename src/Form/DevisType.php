<?php

namespace App\Form;

use App\Entity\Devis;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class DevisType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

            // ->add('date_d', DateType::class, [
            //     "label" => "Date de la demande",
            // ])
            // ->add('numero_d', IntegerType::class, [
            //     "label" => "N°",
            // ])
            ->add('rue_d', TextType::class, [
                 "label" => "Rue",
             ])
            // ->add('voie_d', TextType::class, [
            //     "label" => "Voie",
            // ])
            // ->add('code_postal_d', IntegerType::class, [
            //     "label" => "Code postal",
            // ])
            // ->add('ville_d', TextType::class, [
            //     "label" => "Ville",
            // ])
            // ->add('message_d', TextType::class, [
            //     "label" => "Message",
            // ])
            // ->add('phot_d', TextType::class, [
            //     "label" => "Photo",
            // ])
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
