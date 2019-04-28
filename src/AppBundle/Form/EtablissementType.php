<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EtablissementType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nomEtablissement')->add('typeEtablissement')->add('commentaire')->add('statutEtablissement')->add('dateCreation')->add('adresseEtablissement')->add('telEtablissement')->add('emailEtablissement')->add('sitewebEtablissement')->add('dateEnreg')->add('promotion')->add('commune')->add('arrondissement')->add('departement');
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Etablissement'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_etablissement';
    }


}
