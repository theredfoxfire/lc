<?php

namespace Lc\LcBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class OrderanType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('note', 'textarea', array('attr' => array('class' => 'form-control', 'required' => true, 'placeholder'=>'Catatan tambahan')))
            ->add('address', 'textarea', array('attr' => array('class' => 'form-control', 'required' => true, 'placeholder'=>'Alamat pengiriman lengkap')))
            ->add('phone_wa', 'text', array('attr' => array('class' => 'form-control', 'required' => true, 'placeholder'=>'Nomor WhatsApp')))
            ->add('delivery_date', 'text', array('attr' => array('class' => 'date-order form-control', 'required' => true, 'readonly'=>true)))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Lc\LcBundle\Entity\Orderan'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'lc_lcbundle_orderan';
    }
}
