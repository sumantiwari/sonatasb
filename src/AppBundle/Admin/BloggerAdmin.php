<?php

namespace AppBundle\Admin;

use AppBundle\Entity\Blogger;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class BloggerAdmin extends AbstractAdmin {

//      protected $baseRouteName = 'sonata_poster'; // for changing route name
    public $supportsPreviewMode = true;

    protected function configureFormFields(FormMapper $formMapper) {
        $options =  array(
                    'label' => 'Category',
                    'class' => 'AppBundle\Entity\BloggerType',
                    'property' => 'name',
                    'placeholder' => 'chose a category',
                     'btn_add' => 'true',
                     'btn_list' => 'true',
                     'btn_delete' => 'true',
                     'btn_catalogue' => 'true',
                );
        $formMapper
                ->tab('Post')
                ->with('Content', array('class' => 'col-md-6', 'box_class' => 'box box-solid box-primary', 'description' => 'This section contains general settings for the web page'))
                ->add('title', 'text', array(
                    'label' => 'Blog Title',
                ))
                ->add('body', 'textarea', array(
                    'label' => 'Blog Body'
                ))
                ->add('imageNews', 'sonata_media_type', array(
                    'provider' => 'sonata.media.provider.image',
                    'context' => 'default',
                    'new_on_update' => FALSE
                ))
                ->end()
                ->with('Category', array('class' => 'col-md-6', 'box_class' => 'box box-solid box-primary'))
                //        ->add('blogcategory', 'entity', array(
                
//                ->add('blogcategory', 'sonata_type_model_list',array('btn_delete'=>FALSE))
//                ->add('blogcategory', 'sonata_type_admin', array(), array(
//                'admin_code' => 'admin.bloggertype'
//            ))
                ->setHelps(array(
                    'title' => 'Set the title of a web page',
                    'body' => 'Set the body of a web page',
                ))
                ->end()
                ->end()
                ->tab('Publish Option')
//                ->add('bloggertype.name',null,array('label'=>'Label'))
                ->end()
        ;
    }

    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
                ->addIdentifier('title', 'text', array(
                    'label' => 'Blog Title',
                ))
                ->add('blogcategory', 'sonata_type_model', array(
                    'label' => 'Category',
                    'class' => 'AppBundle\Entity\BloggerType',
                    'property' => 'name',
                ))
                ->add('draft', 'boolean', array(
                    'label' => 'Draft',
                    'editable' => 'true'
                ))
                ->add('_action', null, array(
                    'actions' => array(
                        'show' => array(),
                        'edit' => array(),
                        'delete' => array(),
                    )
                ))
        ;
    }

    public function configureShowFields(ShowMapper $showMapper) {
        $showMapper
                ->tab('General') // the tab call is optional
                ->with('Addresses', array(
                    'class' => 'col-md-8',
                    'box_class' => 'box box-solid box-primary',
                    'description' => 'Lorem ipsum',
                ))
                ->add('title', 'text', array(
                    'label' => 'Blog Title',
                ))
                ->add('body', 'textarea', array(
                    'label' => 'Blog Body'
                ))
                ->add('draft', 'boolean', array(
                    'label' => 'Draft',
                    'editable' => 'true'
                ))
                ->end()
                ->end()
                ->tab('Category')
                ->with('Type', array(
                    'class' => 'col-md-8',
                    'box_class' => 'box box-solid box-primary',
                    'description' => 'Lorem ipsum',
                ))
                ->add('blogcategory.name', 'sonata_type_model', array(
                    'label' => 'Category',
                    'class' => 'AppBundle\Entity\BloggerType',
                    'property' => 'name',
                ))


                // ...
                ->end()
                ->end()

        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper->add('title');
    }

    public function toString($object) {
        return $object instanceof Blogger ? $object->getTitle() : 'Blogger'; // shown in the breadcrumb on the create view
    }

    public function getExportFields() {
        return array('id', 'title', 'blogcategory.name');
    }

    public function getExportFormats() {
        return array('xls', 'csv');
    }

}
