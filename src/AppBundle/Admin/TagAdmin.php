<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\CoreBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Validator\Constraints\MaxLength;
 

use AppBundle\Entity\Tag;

class TagAdmin extends Admin
{
    /**
     * @param \Sonata\AdminBundle\Form\FormMapper $formMapper
     * @return void
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name')
            ->add('enabled', null, array('required' => false))
        ;
    }

    /**
     * @param \Sonata\AdminBundle\Datagrid\DatagridMapper $datagridMapper
     * @return void
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('posts')
        ;
    }

    /**
     * @param \Sonata\AdminBundle\Datagrid\ListMapper $listMapper
     * @return void
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name')
            ->add('enabled')
        ;
    }

    /**
     * @param \Sonata\CoreBundle\Validator\ErrorElement $errorElement
     * @param mixed $object
     * @return void
     */
//    public function validate(ErrorElement $errorElement, $object)
//    {
//        $errorElement
//            ->with('name')
//                ->assertMaxLength(array('limit' => 32))
//            ->end()
//        ;
//    }
}