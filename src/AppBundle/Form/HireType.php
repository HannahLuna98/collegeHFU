<?php

namespace AppBundle\Form;

use AppBundle\Entity\Hire;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('insuranceCover')
            ->add('rentDate')
            ->add('returnDate')
            ->add('daysHired')
            ->add('customer')
            ->add('salesperson')
            ->add('carReg')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefault([
            'data_class' => Hire::class,
            ]
        );
    }
}