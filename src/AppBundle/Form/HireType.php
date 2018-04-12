<?php

namespace AppBundle\Form;

use AppBundle\Entity\Hire;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\Exception\AccessException;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HireType extends AbstractType
{
    /**
     * Builds form for hires
     *
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('insuranceCover')
            ->add('rentDate')
            ->add('returnDate')
            ->add('daysHired')
            ->add('customer')
            ->add('salesperson')
            ->add('carReg');
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
                'data_class' => Hire::class,
            ]
        );
    }
}