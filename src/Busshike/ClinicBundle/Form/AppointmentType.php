<?php

namespace Busshike\ClinicBundle\Form;

use Busshike\ClinicBundle\Entity\Appointments;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AppointmentType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
//                ->add('patient' )
                ->add('time', TimeType::class, array(
                    'input' => 'datetime',
                    'widget' => 'single_text',
                     
                ))
                ->add('date', DateType::class, array(
                    'widget' => 'single_text',
                ))
//                ->add('agreeTerms', CheckboxType::class, array('mapped' => false))
//                ->add('save', SubmitType::class, array('label' => 'Create'))
        ;
        
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => Appointments::class,
        ));
    }

}
