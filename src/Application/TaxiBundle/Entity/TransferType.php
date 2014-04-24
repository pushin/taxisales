<?php
namespace Application\TaxiBundle\Entity;

use Application\TaxiBundle\DoctrineBehaviors\CanBeDeactivated\CanBeDeactivated;
use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model\Timestampable\Timestampable;
use Knp\DoctrineBehaviors\Model\Translatable\Translatable;

/**
 * @ORM\Entity
 */
class TransferType 
{
    use Translatable, Timestampable, CanBeDeactivated;

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="integer")
     */
    protected $personCount;

    /**
     * @ORM\Column(type="integer")
     */
    protected $luggageCount;

    public function __toString()
    {
        return (string) $this->getName();
    }

    /**
     * @param mixed $luggageCount
     */
    public function setLuggageCount($luggageCount)
    {
        $this->luggageCount = $luggageCount;
    }

    /**
     * @return mixed
     */
    public function getLuggageCount()
    {
        return $this->luggageCount;
    }

    /**
     * @param mixed $personCount
     */
    public function setPersonCount($personCount)
    {
        $this->personCount = $personCount;
    }

    /**
     * @return mixed
     */
    public function getPersonCount()
    {
        return $this->personCount;
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

    public function __call($method, $arguments)
    {
        return $this->proxyCurrentLocaleTranslation($method, $arguments);
    }

}