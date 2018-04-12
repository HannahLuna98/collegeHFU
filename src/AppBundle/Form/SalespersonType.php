<?php

namespace AppBundle\Form;

use AppBundle\Entity\Salesperson;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\Exception\AccessException;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class SalespersonType
 *
 * @package AppBundle\Form
 */
class SalespersonType extends AbstractType
{
    /**
     * Builds form for Salesperson
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
                'data_class' => Salesperson::class,
            ]
        );
    }
}