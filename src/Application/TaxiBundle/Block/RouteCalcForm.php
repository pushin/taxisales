<?php
namespace Application\TaxiBundle\Block;

use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\BlockBundle\Block\BaseBlockService;
use Sonata\BlockBundle\Model\BlockInterface;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RouteCalcForm extends BaseBlockService
{

    public function setDefaultSettings(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'url'      => false,
            'title'    => 'Insert the rss title',
            'template' => 'ApplicationTaxiBundle:Block:route_calc_form.html.twig',
        ));
    }

    public function buildEditForm(FormMapper $form, BlockInterface $block)
    {

    }

    public function validateBlock(ErrorElement $errorElement, BlockInterface $block)
    {

    }


} 