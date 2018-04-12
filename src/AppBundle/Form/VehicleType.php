<?php

namespace AppBundle\Form;

use AppBundle\Entity\Vehicle;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VehicleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('carReg')
            ->add('make')
            ->add('model')
            ->add('capacity')
            ->add('price')
            ->add('available')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefault([
            'data_class' => Vehicle::class,
            ]
        );
    }
}