<?php

namespace AppBundle\Form;

use AppBundle\Entity\Vehicle;
use Doctrine\DBAL\Types\DecimalType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
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
                'carReg', null, [
                    'label' => 'Car Registration',
                ]
            )
            ->add(
                'make', null, [
                    'label' => 'Make',
                ]
            )
            ->add(
                'model', null, [
                    'label' => 'Model',
                ]
            )
            ->add(
                'capacity', IntegerType::class, [
                    'label' => 'Capacity',
                ]
            )
            ->add(
                'price', DecimalType::DECIMAL, [
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
                        'Y' => 'Yes',
                        'N' => 'No',
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
                'data_class' => Vehicle::class,
            ]
        );
    }
}