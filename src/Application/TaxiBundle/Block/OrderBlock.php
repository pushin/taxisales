<?php
namespace Application\TaxiBundle\Block;

use Symfony\Cmf\Bundle\BlockBundle\Doctrine\Phpcr\ActionBlock;

class OrderBlock extends ActionBlock
{
    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return 'cmf.block.action';
    }

    /**
     * Returns the default action name
     *
     * @return string
     */
    public function getDefaultActionName()
    {
        return 'taxi.block.order:block';
    }
} 