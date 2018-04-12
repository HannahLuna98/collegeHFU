<?php

namespace AppBundle\Form;

use AppBundle\Entity\Customer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CustomerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName')
            ->add('lastName')
            ->add('street')
            ->add('city')
            ->add('postCode')
            ->add('mobile')
            ->add('email')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefault([
            'data_class' => Customer::class,
            ]
        );
    }
}