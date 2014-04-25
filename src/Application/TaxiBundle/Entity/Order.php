<?php
namespace Application\TaxiBundle\Entity;

use Application\TaxiBundle\DoctrineBehaviors\CanBeDeactivated\CanBeDeactivated;
use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model\Timestampable\Timestampable;

/**
 * @ORM\Entity
 * @ORM\Table(name="Orders")
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

    //TODO: set nullable=false
    /**
     * @ORM\ManyToOne(targetEntity="CurrencyRate")
     * @ORM\JoinColumn(nullable=true)
     */
    protected $currencyRate;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $prepay;

    /**
     * @ORM\Column(type="array")
     */
    protected $extra;

    public function __toString()
    {
        return (string) $this->getId();
    }

    /**
     * @param mixed $extra
     */
    public function setExtra($extra)
    {
        $this->extra = $extra;
    }

    /**
     * @return mixed
     */
    public function getExtra()
    {
        return $this->extra;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $prepay
     */
    public function setPrepay($prepay)
    {
        $this->prepay = $prepay;
    }

    /**
     * @return mixed
     */
    public function getPrepay()
    {
        return $this->prepay;
    }

    /**
     * @param mixed $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param mixed $taxi
     */
    public function setTaxi($taxi)
    {
        $this->taxi = $taxi;
    }

    /**
     * @return mixed
     */
    public function getTaxi()
    {
        return $this->taxi;
    }

    /**
     * @param mixed $transfer
     */
    public function setTransfer($transfer)
    {
        $this->transfer = $transfer;
    }

    /**
     * @return mixed
     */
    public function getTransfer()
    {
        return $this->transfer;
    }

    /**
     * @param mixed $currencyRate
     */
    public function setCurrencyRate($currencyRate)
    {
        $this->currencyRate = $currencyRate;
    }

    /**
     * @return mixed
     */
    public function getCurrencyRate()
    {
        return $this->currencyRate;
    }




} 