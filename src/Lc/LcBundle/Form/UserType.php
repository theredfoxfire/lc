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
            ->add('email', 'email', array('attr'=>array('class'=>'form-control', 'required'=> true,'placeholder'=>'Masukan Alamat Email'), 'label'=>false))
            ->add('password', 'password', array('attr'=>array('class'=>'form-control', 'required'=> true,'placeholder'=>'Masukan Password'), 'label'=>false))
            ->add('password2', 'password', array('attr'=>array('class'=>'form-control', 'required'=> true,'placeholder'=>'Ulangi Password'), 'label'=>false))
            ->add('birthday', 'text', array('attr' => array('class' => 'date form-control', 'required' => true, 'readonly'=>true)))
            ->add('sex', 'choice', array('choices' => array('1' => 'Laki-laki ','2' => 'Perempuan'), 'attr'=>array('class'=>''),'multiple' => false,'expanded' => true,'required' => true,))
            ->add('fullname', 'text', array('attr' => array('class' => 'form-control', 'required' => true, 'placeholder'=>'Nama Lengkap')))
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
