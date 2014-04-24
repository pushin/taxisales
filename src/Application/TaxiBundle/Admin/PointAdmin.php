<?php

namespace Application\TaxiBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class PointAdmin extends Base\TranslatableAdmin
{
    protected $translationDomain = 'ApplicationTaxiBundle_Admin_Point';

    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('automatic')
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
//            ->add('automatic')
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
//            ->add('automatic')
//            ->add('createdAt')
//            ->add('updatedAt')
            ->add('active')
            ->add('type', 'entity', array('class' => "ApplicationTaxiBundle:PointType"))
            ->add('country', 'entity', array('class' => "ApplicationTaxiBundle:Country"))
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
            ->add('automatic')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('active')
        ;
    }
}
