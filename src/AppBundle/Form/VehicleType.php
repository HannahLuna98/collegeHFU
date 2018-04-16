<?php

namespace AppBundle\Form;

use AppBundle\Entity\Vehicle;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
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
            ->add(
                'car_price', NumberType::class, [
                    'label' => 'Price',
                    'attr' => [
                        'placeholder' => '£ 0000.00'
                    ]
                ]
            )
            ->add(
                'available', ChoiceType::class, [
                    'label' => 'Available?',
                    'choices' => [
                        'Yes' => 1,
                        'No' => 0,
                    ]
                ]
            );
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
            ]
        );
    }
}