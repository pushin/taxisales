<?php

namespace Application\TaxiBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class TransferAdmin extends Admin
{
    protected $translationDomain = 'ApplicationTaxiBundle_Admin_Transfer';

    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('price')
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
            ->add('route')
            ->add('type')
            ->add('price')
            ->add('currency')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('active')
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
            ->add('price')
            ->add('currency', 'entity', array('class' => 'ApplicationTaxiBundle:Currency'))
            ->add('route', 'entity', array('class' => 'ApplicationTaxiBundle:Route'))
            ->add('type', 'entity', array('class' => 'ApplicationTaxiBundle:TransferType'))
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
            ->add('price')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('active')
        ;
    }
}
