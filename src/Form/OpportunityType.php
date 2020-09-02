<?php

namespace App\Form;

use App\Entity\Opportunity;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OpportunityType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('cprospect')
            ->add('nomaffaire')
            ->add('source')
            ->add('dateecheance')
            ->add('montant')
            ->add('devise')
            ->add('etape')
            ->add('proba')
            ->add('brief')
            ->add('societe')
            ->add('archive')
            ->add('idref')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Opportunity::class,
        ]);
    }
}
