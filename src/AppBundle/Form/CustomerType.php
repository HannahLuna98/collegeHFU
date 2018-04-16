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
                'first_name', null, [
                    'label' => 'First Name',
                ]
            )
            ->add(
                'last_name', null, [
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
                'post_code', null, [
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
            ]
        );
    }
}