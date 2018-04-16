<?php

namespace AppBundle\Form;

use AppBundle\Entity\Vehicle;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
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
        $vehicles = $options['vehicles'];
        $customers = $options['customers'];

        $builder
            ->add(
                'insurance_cover', ChoiceType::class, [
                    'label' => 'Include Basic Insurance?',
                    'choices' => [
                        'Yes' => 1,
                        'No' => 0,
                        ]
                ]
            )
            ->add(
                'rent_date', DateType::class, [
                    'label' => 'Rent Date',
                ]
            )
            ->add(
                'return_date', DateType::class, [
                    'label' => 'Return Date',
                ]
            )
            ->add(
                'customer_id', ChoiceType::class, [
                    'label' => 'Customer ID',
                    'choices' => $customers,
                ]
            )
            ->add(
                'car_registration', ChoiceType::class, [
                    'label' => 'Car Registration',
                    'choices' => $vehicles,
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
        $resolver->setDefined(
            [
                'vehicles',
                'customers'
            ]
        );
    }
}