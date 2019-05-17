<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
//use Symfony\Bridge\Doctrine\Form\Type\EntityType; // add this

class OffreType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('intituleOffre')->add('entreprise')->add('diplome')
        ->add('natureOffre',ChoiceType::class,['choices'=>['payant'=> true,'non payant'=> false]])
        
        ->add('typeOffre',ChoiceType::class,['choices'=>['Emploi'=> true,'Stage'=> false, 'Job'=> false,'Autre'=> false]])
        ->add('dureeOffre')->add('descriptionOffre')->add('pjOffre')->add('datevaliditeOffre')
        ->add('path', HiddenType::class)
            ->add('file', FileType::class, array('required' => false));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Offre'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_offre';
    }


}
