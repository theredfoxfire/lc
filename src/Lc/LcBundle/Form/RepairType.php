<?php

namespace Lc\LcBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RepairType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('password', 'repeated', array(
            'type' => 'password',
            'invalid_message' => 'Password yang diulangi harus sama.',
            'required' => true,
            'first_options'  => array('label' => 'Masukan Password Baru', 'attr'=>array('class'=>'form-control', 'required'=> true,'placeholder'=>'Password baru')),
            'second_options' => array('label' => 'Ulangi Password', 'attr'=>array('class'=>'form-control', 'required'=> true,'placeholder'=>'Ulangi password baru'),),
            'label'=>false,
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Lc\LcBundle\Entity\Repair',
        ));
    }

    public function getName()
    {
        return 'repair';
    }
}
