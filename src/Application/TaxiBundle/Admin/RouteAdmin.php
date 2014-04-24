<?php

namespace Application\TaxiBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class RouteAdmin extends Admin
{
    protected $translationDomain = 'ApplicationTaxiBundle_Admin_Route';

    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('length')
            ->add('time')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('active')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id')
            ->add('origin')
            ->add('destination')
            ->add('length')
            ->add('time')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('active', null, array('editable' => true))
            ->add('_action', 'actions', array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )
            ))
        ;
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
//            ->add('id')
            ->add('length')
            ->add('time')
            ->add('origin', 'entity', array('class' => "ApplicationTaxiBundle:Point"))
            ->add('destination', 'entity', array('class' => "ApplicationTaxiBundle:Point"))
//            ->add('createdAt')
//            ->add('updatedAt')
            ->add('active')
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('length')
            ->add('time')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('active')
        ;
    }
}
