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
            ->add('hobby')
            ->add('work')
            ->add('education')
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
