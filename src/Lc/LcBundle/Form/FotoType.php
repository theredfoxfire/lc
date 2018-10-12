<?php

namespace Lc\LcBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FotoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('file', 'file',array('attr'=>array('class'=>'', 'required'=>false,'placeholder'=>'Password lama'), 'label'=>false))
        ->add('email', 'hidden', array('attr'=>array('class'=>'form-control', 'required'=> true,'placeholder'=>'Masukan Alamat Email'), 'label'=>false))
			->add('password', 'hidden', array('attr'=>array('value'=>'love','class'=>'form-control', 'required'=> true,'placeholder'=>'Masukan Password'), 'label'=>false))
			->add('password2', 'hidden', array('attr'=>array('value'=>'love','class'=>'form-control', 'required'=> true,'placeholder'=>'Ulangi Password'), 'label'=>false))
            ->add('fullname', 'hidden', array('attr' => array('value'=>'love','class' => 'form-control', 'required' => true, 'placeholder'=>'Nama Lengkap')))
			->add('sex', 'hidden', array('attr'=>array('class'=>''),'required' => true,))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Lc\LcBundle\Entity\User',
        ));
    }

    public function getName()
    {
        return 'foto';
    }
}
