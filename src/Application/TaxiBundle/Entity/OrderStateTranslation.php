<?php
namespace Application\TaxiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model\Translatable\Translation;

/**
 * @ORM\Entity
 */
class OrderStateTranslation 
{
    use Translation;

    /**
     * @ORM\Column
     */
    protected $name;
} 