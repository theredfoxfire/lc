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
            ->add('hobby', null, array('attr'=>array('class'=>'form-control', 'placeholder'=>'Hobby Anda'), 'required'=> false, 'label'=>false))
            ->add('job', null, array( 'attr'=>array('class'=>'form-control', 'placeholder'=>'Pekerjaan Anda'), 'required'=> false, 'label'=>false))
            ->add('education', null, array( 'attr'=>array('class'=>'form-control', 'placeholder'=>'Pendidikan Anda'), 'required'=> false, 'label'=>false))
            ->add('sallary', null, array( 'attr'=>array('class'=>'form-control', 'placeholder'=>'Kisaran gaji Anda'), 'required'=> false, 'label'=>false))
            ->add('province', null, array( 'attr'=>array('class'=>'form-control', 'placeholder'=>'Province Anda'), 'required'=> false, 'label'=>false))
            ->add('lived', null, array( 'attr'=>array('class'=>'form-control', 'placeholder'=>'Tempat tinggal Anda'), 'required'=> false, 'label'=>false))
            ->add('smoking', null, array( 'attr'=>array('class'=>'form-control', 'placeholder'=>'Anda seorang perokok?'), 'required'=> false, 'label'=>false))
            ->add('status', null, array( 'attr'=>array('class'=>'form-control', 'placeholder'=>'Status pernikahan Anda'), 'required'=> false, 'label'=>false))
            ->add('religy', null, array( 'attr'=>array('class'=>'form-control', 'placeholder'=>'Agama Anda'), 'required'=> false, 'label'=>false))
            ->add('alcoholic', null, array( 'attr'=>array('class'=>'form-control', 'placeholder'=>'Anda meminum minuman beralkohol?'), 'required'=> false, 'label'=>false))
            ->add('plan', null, array( 'attr'=>array('class'=>'form-control', 'placeholder'=>'Rencana Anda menikah'), 'required'=> false, 'label'=>false))
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
