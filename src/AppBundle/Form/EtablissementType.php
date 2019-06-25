<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class EtablissementType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nomEtablissement')->add('typeEtablissement',ChoiceType::class,['choices'=>['Collège'=> true,'Lycée'=> false]])
        ->add('statutEtablissement',ChoiceType::class,['choices'=>['Public'=> true,'Privé'=> false]])

        ->add('dateCreation')->add('adresseEtablissement')->add('telEtablissement')->add('emailEtablissement')->add('sitewebEtablissement')->add('commune')->add('arrondissement')->add('departement');
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
