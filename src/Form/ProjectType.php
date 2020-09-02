<?php

namespace App\Form;

use App\Entity\Project;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('intitule')
            ->add('libelle')
            ->add('interne')
            ->add('description')
            ->add('dureeProjet')
            ->add('datePublication')
            ->add('dateLimite')
            ->add('dateCreation')
            ->add('dateDebut')
            ->add('dateFin')
            ->add('adresse')
            ->add('budget')
            ->add('benifice_net')
            ->add('benifice_brut')
            ->add('path')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Project::class,
        ]);
    }
}
