<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class Ecole_supType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nomEcole')->add('nomUniversite')
        ->add('typeEcole',ChoiceType::class,['choices'=>['Ecole'=> true,'Faculté'=> false],])
        
        ->add('statutEcole',ChoiceType::class,['choices'=>['Public'=> true,'Privé'=> false],])
        ->add('adresEcole')->add('telEcole')->add('emailEcole')->add('urlEcole')->add('anneeCreation')->add('commune');
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Ecole_sup'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_ecole_sup';
    }


}
