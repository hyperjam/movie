<?php

namespace Project\FilmsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class OrdersType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titlet')

            ->add('paymentform', 'choice', array(
    'choices'   => array('cash' => 'Cash', 'credit card' => 'Credit card', 'debit card' => 'Debit card'),
    'required'  => true,

))
            ->add('dateOfpay','date')
             ->add('Order film', 'submit', array(
                'label' => 'Submit', 
                'attr' => array(
                    'class' => 'btn btn-primary'
                ))
                 )
            
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Project\FilmsBundle\Entity\Orders'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'project_filmsbundle_orders';
    }
}
