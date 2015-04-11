<?php

namespace Lc\LcBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DatauType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
			->add('password', 'hidden', array('attr'=>array('class'=>'form-control', 'value'=>'love',  'required'=> true,'placeholder'=>'Masukan Password'), 'label'=>false))
			->add('password2', 'hidden', array('attr'=>array('class'=>'form-control', 'value'=>'love', 'required'=> true,'placeholder'=>'Ulangi Password'), 'label'=>false))
            ->add('email', 'email', array('attr'=>array('class'=>'form-control', 'required'=> true,'placeholder'=>'Alamat Email Anda'), 'label'=>false))
			->add('phone', 'text', array('attr'=>array('class'=>'form-control', 'required'=> true,'placeholder'=>'Nomor Telephone Anda'), 'label'=>false))
			->add('username', 'text', array('attr'=>array('class'=>'form-control', 'required'=> true,'placeholder'=>'Username'), 'label'=>false))
			
			
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Lc\LcBundle\Entity\User'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'lc_lcbundle_user';
    }
}
