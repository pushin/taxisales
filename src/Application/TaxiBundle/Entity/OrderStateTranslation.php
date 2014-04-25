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

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    
} 