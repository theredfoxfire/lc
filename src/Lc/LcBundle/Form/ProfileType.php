<?php

namespace Lc\LcBundle\Form;

use Doctrine\ORM\EntityManager;
use Lc\LcBundle\Entity\Province;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;

class ProfileType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
     
    protected $em;

    function __construct(EntityManager $em)
    {
        $this->em = $em;
    }
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
			->add('name', 'text', array('attr'=>array('class'=>'form-control', 'placeholder'=>'Nama Lengkap'), 'required'=> true, 'label'=>false))
            ->add('about', 'textarea', array('attr'=>array('class'=>'form-control', 'placeholder'=>'Tentang Anda'), 'required'=> false, 'label'=>false))
            ->add('address', 'textarea', array('attr'=>array('class'=>'form-control', 'placeholder'=>'Alamat lengkap'), 'required'=> false, 'label'=>false))
            ->add('hobby', null, array('attr'=>array('class'=>'form-control','placeholder'=>'Hobby Anda'), 'required'=> false, 'label'=>false))
            ->add('job', null, array( 'attr'=>array('class'=>'form-control', 'placeholder'=>'Pekerjaan Anda'), 'required'=> false, 'label'=>false))
            ->add('education', null, array( 'attr'=>array('class'=>'form-control','placeholder'=>'Pendidikan Anda'), 'required'=> false, 'label'=>false))
            ->add('sallary', null, array( 'attr'=>array('class'=>'form-control', 'placeholder'=>'Kisaran gaji Anda'), 'required'=> false, 'label'=>false))
            ->add('lived', null, array( 'attr'=>array('class'=>'form-control', 'placeholder'=>'Tempat tinggal Anda'), 'required'=> false, 'label'=>false))
            ->add('smoking', null, array( 'attr'=>array('class'=>'form-control','placeholder'=>'Anda seorang perokok?'), 'required'=> false, 'label'=>false))
            ->add('status', null, array( 'attr'=>array('class'=>'form-control', 'placeholder'=>'Status pernikahan Anda'), 'required'=> false, 'label'=>false))
            ->add('religy', null, array( 'attr'=>array('class'=>'form-control', 'placeholder'=>'Agama Anda'), 'required'=> false, 'label'=>false))
            ->add('alcoholic', null, array( 'attr'=>array('class'=>'form-control','placeholder'=>'Anda meminum minuman beralkohol?'), 'required'=> false, 'label'=>false))
            ->add('plan', null, array( 'attr'=>array('class'=>'form-control','placeholder'=>'Rencana Anda menikah'), 'required'=> false, 'label'=>false))
        ;
        
        // Add listeners
        $builder->addEventListener(FormEvents::PRE_SET_DATA, array($this, 'onPreSetData'));
        $builder->addEventListener(FormEvents::PRE_SUBMIT, array($this, 'onPreSubmit'));
    }
    
     protected function addElements(FormInterface $form, Province $province = null) {
        // Add the province element
        $form->add('province', 'entity', array(
			'attr'=>array('class'=>'form-control', 'placeholder'=>'Province Anda'),
            'data' => $province,
            'required'=> false,
            'empty_value' => '-- Pilih Provinsi --',
            'class' => 'LcLcBundle:Province',
            'mapped' => false)
        );

        // Cities are empty, unless we actually supplied a province
        $cities = array();
        if ($province) {
            // Fetch the cities from specified province
            $repo = $this->em->getRepository('LcLcBundle:City');
            $cities = $repo->findByProvince($province, array('name' => 'asc'));
        }

        // Add the city element
        $form->add('city', 'entity', array(
			'attr'=>array('class'=>'form-control', 'placeholder'=>'Kota/Kabupaten Anda'),
			'required'=> false,
            'empty_value' => '-- Pilih provinsi dulu --',
            'class' => 'LcLcBundle:City',
            'choices' => $cities,
        ));
    }
    
    function onPreSubmit(FormEvent $event) {
        $form = $event->getForm();
        $data = $event->getData();

        // Note that the data is not yet hydrated into the entity.
        $province = $this->em->getRepository('LcLcBundle:Province')->find($data['province']);
        $this->addElements($form, $province);
    }
    
    function onPreSetData(FormEvent $event) {
        $account = $event->getData();
        $form = $event->getForm();

        // We might have an empty account (when we insert a new account, for instance)
        $province = $account->getCity() ? $account->getCity()->getProvince() : null;
        $this->addElements($form, $province);
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
