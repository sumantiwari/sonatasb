<?php

namespace Busshike\ClinicBundle\Admin;

use Busshike\ClinicBundle\Form\AppointmentType;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

 

class PatientsAdmin extends Admin
{
   // protected $parentAssociationMapping = 'post';

    /**
     * @param FormMapper $formMapper
     * @return void
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
//        if(!$this->isChild()) {
//            $formMapper->add('post', 'sonata_type_model_list', array() );
//        }

        $formMapper
            ->add('name')
            ->add('age')
            ->add('phone')
            ->add('email','email')
            ->add('address')
//            ->add('appointment', 'sonata_type_collection',array(
//                  'by_reference' => false,
//                'type_options' => array(
//                    // Prevents the "Delete" option from being displayed
//                    'delete' => false,
//                    'delete_options' => array(
//                        // You may otherwise choose to put the field but hide it
//                        'type'         => 'hidden',
//                        // In that case, you need to fill in the options as well
//                        'type_options' => array(
//                            'mapped'   => TRUE,
//                            'required' => false,
//                        )
//                    ))
//            ),array(
//                 'edit' => 'inline',
//                'inline' => 'table',
//                'sortable' => 'position',
//            ) )
            ->add('appointment', 'sonata_type_collection', array(
                 'by_reference'=>FALSE
            ), array(
                'edit' => 'inline',
                'inline' => 'table',
                'sortable' => 'position',
            ))

        ;
    }

    /**
     * @param DatagridMapper $datagridMapper
     * @return void
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('email')
            ->add('phone')
        ;
    }

    /**
     * @param ListMapper $listMapper
     * @return void
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name')
            ->add('age')
            ->add('email')
            ->add('phone')
            ->add('address')
             ->add('_action', 'actions', array(
            'actions' => array(
                'show' => array(),
                'edit' => array(),
                'comments' => array('template' => 'BusshikeClinicBundle::patients_appointments.html.twig')
            )
        ))
        
                ;
    }

//    /**
//     * @return array
//     */
//    public function getBatchActions()
//    {
//        $actions = parent::getBatchActions();
//
//        $actions['enabled'] = array(
//            'label' => $this->trans('batch_enable_comments'),
//            'ask_confirmation' => true,
//        );
//
//        $actions['disabled'] = array(
//            'label' => $this->trans('batch_disable_comments'),
//            'ask_confirmation' => false
//        );
//
//        return $actions;
//    }
    
    public function toString($object) {
        return $object instanceof Patients ? $object->getTitle() : 'Patient'; // shown in the breadcrumb on the create view
    }
}