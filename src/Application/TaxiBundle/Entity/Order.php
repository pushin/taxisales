<?php
namespace Application\TaxiBundle\Entity;

use Application\TaxiBundle\DoctrineBehaviors\CanBeDeactivated\CanBeDeactivated;
use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model\Timestampable\Timestampable;

/**
 * @ORM\Entity
 */
class Order 
{
    use Timestampable, CanBeDeactivated;

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="OrderState")
     * @ORM\JoinColumn(nullable=false)
     */
    protected $state;

    /**
     * @ORM\ManyToOne(targetEntity="Taxi")
     */
    protected $taxi;

    /**
     * @ORM\ManyToOne(targetEntity="Transfer")
     * @ORM\JoinColumn(nullable=false)
     */
    protected $transfer;

    /**
     * @ORM\ManyToOne(targetEntity="CurrencyRate")
     * @ORM\JoinColumn(nullable=false)
     */
    protected $currencyRate;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $prepay;

    /**
     * @ORM\Column(type="array")
     */
    protected $extra;


} 