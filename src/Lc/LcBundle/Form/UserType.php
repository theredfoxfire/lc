<?php

namespace Lc\LcBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', 'email', array('attr'=>array('class'=>'form-control', 'required'=> false,'placeholder'=>'Masukan Alamat Email'), 'label'=>false))
			->add('password', 'password', array('attr'=>array('class'=>'form-control', 'required'=> false,'placeholder'=>'Masukan Password'), 'label'=>false))
			->add('password2', 'password', array('attr'=>array('class'=>'form-control', 'required'=> false,'placeholder'=>'Ulangi Password'), 'label'=>false))
			->add('birthday','text',array('attr' => array('class' => 'date form-control', 'readonly'=>true)))
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
