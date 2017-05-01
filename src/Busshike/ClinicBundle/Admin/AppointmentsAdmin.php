<?php

namespace Busshike\ClinicBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

class AppointmentsAdmin extends  AbstractAdmin
{
    public function getParentAssociationMapping()
    {
        return 'patient';
    }
    /**
     * @param FormMapper $formMapper
     * @return void
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        if(!$this->isChild()) {
//            exit("rubbish");
//            $formMapper->add('patient', 'sonata_type_model_list', array() );
        }

        $formMapper
              ->add('patient', 'sonata_type_model_list', array() )
            ->add('date','date', array(
                'pattern' => 'dd MMM y G',
                'widget' => 'single_text',
                 
            ))
            ->add('time','time', array(
                'widget'=> 'single_text',
            ))
             
        ;
        if ($this->getRoot() instanceof PatientsAdmin) {
        $formMapper->remove('patient');
    }
    }
    
    public function getNewInstance()
{
    $object = parent::getNewInstance();

    // Here we specify the 'corporate_attributes'
    if ($this->getRoot()->getSubject() instanceof PatientsAdmin) {
        $object->setPatient($this->getRoot()->getSubject());
    }

    return $object;
}

    /**
     * @param DatagridMapper $datagridMapper
     * @return void
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('date','doctrine_orm_date_range')
            ->add('time')
             
        ;
    }

    /**
     * @param ListMapper $listMapper
     * @return void
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
                  ->add('patient')
            ->addIdentifier('date')
            ->add('time')
            ;
    }

    /**
     * @return array
     */
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
}