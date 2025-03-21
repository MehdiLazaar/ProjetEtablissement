<?php

namespace App\Form;

use App\Entity\Etablissement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EtablissementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('appellationOfficiel')
            ->add('denominationPrincipale')
            ->add('longitude')
            ->add('adresse')
            ->add('departement')
            ->add('commune')
            ->add('region')
            ->add('academie')
            ->add('dateOuverture', null, [
                'widget' => 'single_text',
            ])
            ->add('secteur')
            ->add('code_departement')
            ->add('code_region')
            ->add('code_academie')
            ->add('code_commune')
            ->add('latitude')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Etablissement::class,
        ]);
    }
}
