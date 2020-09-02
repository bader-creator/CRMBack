<?php

namespace App\Form;

use App\Entity\Soum;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SoumType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('description')
            ->add('dureeMission')
            ->add('datePublication')
            ->add('dateSoumission')
            ->add('dateCreation')
            ->add('dateDebut')
            ->add('dateFin')
            ->add('adresseDepot')
            ->add('isTuneps')
            ->add('path')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Soum::class,
        ]);
    }
}
