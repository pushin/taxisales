<?php

namespace Application\TaxiBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class OrderAdmin extends Admin
{
    protected $translationDomain = 'ApplicationTaxiBundle_Admin_Order';
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('prepay')
            ->add('extra')
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
            ->add('state', null, array('editable' => true))
            ->add('taxi')
            ->add('transfer')
            ->add('prepay')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('active')
            ->add('_action', 'actions', array(
                'actions' => array(
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
            ->add('prepay')
            ->add('active')
            ->add('state', 'entity', array('class' => "ApplicationTaxiBundle:OrderState"))
            ->add('taxi', 'entity', array(
                'class' => "ApplicationTaxiBundle:Taxi",
                'required' => false,
            ))
            ->add('transfer', 'entity', array('class' => "ApplicationTaxiBundle:Transfer"))
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('prepay')
            ->add('extra')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('active')
        ;
    }
}
