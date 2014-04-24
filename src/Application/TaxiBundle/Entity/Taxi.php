<?php
namespace Application\TaxiBundle\Entity;

use Application\TaxiBundle\DoctrineBehaviors\CanBeDeactivated\CanBeDeactivated;
use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model\Timestampable\Timestampable;
use Knp\DoctrineBehaviors\Model\Translatable\Translatable;

/**
 * @ORM\Entity
 */
class Taxi 
{
    use Timestampable, Translatable, CanBeDeactivated;

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="\Application\Sonata\UserBundle\Entity\User")
     */
    protected $user;

    /**
     * @ORM\ManyToMany(targetEntity="Point")
     */
    protected $points;

    /**
     * @ORM\Column(type="integer")
     */
    protected $rating;

    /**
     * @ORM\ManyToOne(targetEntity="Currency")
     */
    protected $currency;

    /**
     * @ORM\Column
     */
    protected $phone;

    /**
     * @ORM\Column
     */
    protected $email;

    /**
     * @ORM\Column
     */
    protected $skype;
}