<?php
namespace Application\TaxiBundle\Entity;

use Knp\DoctrineBehaviors\Model\Translatable\Translation;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class PointTranslation
{
    use Translation;

    /** @ORM\Column(type="string") */
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
