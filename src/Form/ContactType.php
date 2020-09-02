<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fullname')
            ->add('date_de_naissance')
            ->add('fonction')
            ->add('organisme')
            ->add('pays')
            ->add('tel')
            ->add('mail')
            ->add('adresse')
            ->add('commentaire')
            ->add('nature_de_contact')
            ->add('cadre_de_rencontre')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
