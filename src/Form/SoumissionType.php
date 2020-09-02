<?php

namespace App\Form;

use App\Entity\Soumission;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SoumissionType extends AbstractType
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
            'data_class' => Soumission::class,
        ]);
    }
}
