<?php

namespace AppBundle\Form;

use AppBundle\Entity\Salesperson;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SalespersonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName')
            ->add('lastName')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefault([
            'data_class' => Salesperson::class,
            ]
        );
    }
}