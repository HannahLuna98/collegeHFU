<?php

namespace AppBundle\Form;

use AppBundle\Entity\Hire;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
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
            ->add(
                'insuranceCover', ChoiceType::class, [
                'label' => 'Include Basic Insurance?',
                'choices' => [
                    'Y' => 'Yes',
                    'N' => 'No',
                    ]
                ]
            )
            ->add(
                'rentDate', DateType::HTML5_FORMAT, [
                'label' => 'Rent Date',
                'attr'  => [
                    'placeholder' => 'e.g. yyyy-MM-dd',
                    ]
                ]
            )
            ->add(
                'returnDate', DateType::HTML5_FORMAT, [
                'label' => 'Return Date',
                'attr'  => [
                    'placeholder' => 'e.g. yyyy-MM-dd',
                    ]
                ]
            )
            ->add(
                'daysHired', IntegerType::class, [
                'label' => 'Days Hired',
                ]
            )
            ->add(
                'customer', null, [
                'label' => 'Customer Name',
                ]
            )
            ->add(
                'salesperson', null, [
                'label' => 'Salesperson Name',
                ]
            )
            ->add(
                'carReg', null, [
                'label' => 'Car Registration',
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
                'data_class' => Hire::class,
            ]
        );
    }
}