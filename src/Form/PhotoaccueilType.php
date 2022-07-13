<?php

namespace App\Form;

use App\Entity\Photoaccueil;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PhotoaccueilType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('carrouselp')
            ->add('carrouseld')
            ->add('carrouselt')
            ->add('carrouselq')
            ->add('carrouselc')
            ->add('prestation')
            ->add('pianod')
            ->add('pianoaq')
            ->add('diapason')
            ->add('accessoir')
            ->add('clef')
            ->add('note')
            ->add('video')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Photoaccueil::class,
        ]);
    }
}
