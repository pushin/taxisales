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
}
