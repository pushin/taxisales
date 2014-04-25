<?php

namespace Application\TaxiBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class OrderStateAdmin extends Base\TranslatableAdmin
{
    protected $translationDomain = 'ApplicationTaxiBundle_Admin_OrderState';
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('code')
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
            ->add('name')
            ->add('code')
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
            ->add('code')
            ->add('active')
            ->add('translations', 'a2lix_translations', array('translation_domain' => $this->translationDomain))
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('code')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('active')
        ;
    }
}
