<?php

namespace Lc\LcBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UsercriteriaType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('hobby', null, array('attr'=>array('class'=>'form-control', 'required'=> true,'placeholder'=>'Hobby Anda'), 'label'=>false))
            ->add('job', null, array( 'attr'=>array('class'=>'form-control', 'required'=> true,'placeholder'=>'Pekerjaan Anda'), 'label'=>false))
            ->add('education', null, array( 'attr'=>array('class'=>'form-control', 'required'=> true,'placeholder'=>'Pendidikan Anda'), 'label'=>false))
            ->add('sallary', null, array( 'attr'=>array('class'=>'form-control', 'required'=> true,'placeholder'=>'Kisaran gaji Anda'), 'label'=>false))
            ->add('province', null, array( 'attr'=>array('class'=>'form-control', 'required'=> true,'placeholder'=>'Province Anda'), 'label'=>false))
            ->add('lived', null, array( 'attr'=>array('class'=>'form-control', 'required'=> true,'placeholder'=>'Tempat tinggal Anda'), 'label'=>false))
            ->add('smoking', null, array( 'attr'=>array('class'=>'form-control', 'required'=> true,'placeholder'=>'Anda seorang perokok?'), 'label'=>false))
            ->add('status', null, array( 'attr'=>array('class'=>'form-control', 'required'=> true,'placeholder'=>'Status pernikahan Anda'), 'label'=>false))
            ->add('religy', null, array( 'attr'=>array('class'=>'form-control', 'required'=> true,'placeholder'=>'Agama Anda'), 'label'=>false))
            ->add('alcoholic', null, array( 'attr'=>array('class'=>'form-control', 'required'=> true,'placeholder'=>'Anda meminum minuman beralkohol?'), 'label'=>false))
            ->add('plan', null, array( 'attr'=>array('class'=>'form-control', 'required'=> true,'placeholder'=>'Rencana Anda menikah'), 'label'=>false))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Lc\LcBundle\Entity\Usercriteria'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'lc_lcbundle_usercriteria';
    }
}
