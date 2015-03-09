<?php

namespace Lc\LcBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProfileType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('hobby')
            ->add('work')
            ->add('education')
            ->add('address')
            ->add('sallary')
            ->add('province')
            ->add('city')
            ->add('lived')
            ->add('smoking')
            ->add('status')
            ->add('sex')
            ->add('religy')
            ->add('alcoholic')
            ->add('plan')
            ->add('created_at')
            ->add('updated_at')
            ->add('token')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Lc\LcBundle\Entity\Profile'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'lc_lcbundle_profile';
    }
}
