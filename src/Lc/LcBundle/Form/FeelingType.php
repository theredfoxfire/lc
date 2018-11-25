<?php

namespace Lc\LcBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FeelingType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('feel', 'textarea', array('attr' => array( 'class' => 'form-control', 'required' => true, 'placeholder' => 'Apa perasaanmu?'), 'label'=>false))
            ->add('file', 'file', array('attr'=>array('class'=>'', 'placeholder'=>'Password lama', 'accept'=>"image/png,image/jpg, image/jpeg"), 'required' =>false, 'label'=>false))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Lc\LcBundle\Entity\Feeling'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'lc_lcbundle_feeling';
    }
}
