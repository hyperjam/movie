<?php

namespace Project\FilmsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ReviewType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titlet')
            ->add('review','textarea',array('label'=>'Type your reflection here'))
            ->add('topreviewed','integer',array('label'=>'Rate the film (from -10 to 10)'))
            ->add('save', 'submit', array(
                'label' => 'Submit', 
                'attr' => array(
                    'class' => 'btn btn-primary'
                )
            ))
        ;

    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Project\FilmsBundle\Entity\Review'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'project_filmsbundle_review';
    }
}
