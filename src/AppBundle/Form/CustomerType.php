<?php

namespace AppBundle\Form;

use AppBundle\Entity\Customer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\Exception\AccessException;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class CustomerType
 *
 * @package AppBundle\Form
 */
class CustomerType extends AbstractType
{
    /**
     * Builds form fields for Customer
     *
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'firstName', null, [
                    'label' => 'First Name',
                ]
            )
            ->add(
                'lastName', null, [
                    'label' => 'Last Name',
                ]
            )
            ->add(
                'street', null, [
                    'label' => 'Street Name',
                ]
            )
            ->add(
                'city', null, [
                    'label' => 'City',
                ]
            )
            ->add(
                'postCode', null, [
                    'label' => 'Postcode',
                ]
            )
            ->add(
                'mobile', null, [
                    'label' => 'Mobile No.',
                ]
            )
            ->add(
                'email', null, [
                    'label' => 'Email Address',
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
            'data_class' => Customer::class,
            ]
        );
    }
}