<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class CoachType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nomCoach')->add('prenomCoach')
        ->add('sexeCoach',ChoiceType::class,['choices'=>['Masculin'=> true,'Féminin'=> false]])->add('datenaissanceCoach')
        ->add('pieceCoach',ChoiceType::class,['choices'=>['CIN'=> true,'Passeport'=> false]])
        ->add('numpieceCoach')->add('adresseCoach')->add('telCoach')->add('emailCoach')
        ->add('typeCoach',ChoiceType::class,['choices'=>['Répétiteur'=> true,'Encadreur'=> false]])
        ->add('arrondissement');
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Coach'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_coach';
    }


}
