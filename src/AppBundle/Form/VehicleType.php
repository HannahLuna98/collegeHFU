<?php

namespace AppBundle\Form;

use AppBundle\Entity\Vehicle;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\Exception\AccessException;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VehicleType extends AbstractType
{
    /**
     * Builds form for vehicles
     * 
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('carReg')
            ->add('make')
            ->add('model')
            ->add('capacity')
            ->add('price')
            ->add('available');
    }

    /**
     * Configure form for Customer
     *
     * @param OptionsResolver $resolver does things
     *
     * @inheritdoc
     *
     * @throws AccessException
     * @return null
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class' => Vehicle::class,
            ]
        );
    }
}