<?php
/**
 * Created by PhpStorm.
 * User: picom
 * Date: 21.04.14
 * Time: 16:51
 */

namespace Application\TaxiBundle\Entity;

use Knp\DoctrineBehaviors\Model\Translatable\Translation;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class CountryTranslation
{
    use Translation;

    /**
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * Set name
     *
     * @param string $name
     * @return PointTypeTranslation
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

}
