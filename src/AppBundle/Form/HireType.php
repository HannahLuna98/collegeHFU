<?php

namespace AppBundle\Form;

use AppBundle\Entity\Hire;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\DataTransformer\DateTimeToStringTransformer;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\ReversedTransformer;
use Symfony\Component\Intl\DateFormatter\DateFormat\Transformer;
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
            ->add(
                'insurance_cover', ChoiceType::class, [
                'label' => 'Include Basic Insurance?',
                'choices' => [
                    'Y' => 'Yes',
                    'N' => 'No',
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
                'customer', null, [
                'label' => 'Customer ID',
                ]
            )
            ->add(
                'car_registration', null, [
                'label' => 'Car Registration',
                ]
            );
        $builder->get('rent_date')->addModelTransformer(new ReversedTransformer(new DateTimeToStringTransformer()));
        $builder->get('return_date')->addModelTransformer(new ReversedTransformer(new DateTimeToStringTransformer()));
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