<?php
namespace Application\TaxiBundle\Entity;

use Application\TaxiBundle\DoctrineBehaviors\CanBeDeactivated\CanBeDeactivated;
use Application\TaxiBundle\DoctrineBehaviors\Translatable\Translatable;
use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model\Timestampable\Timestampable;


/**
 * @ORM\Entity
 */
class Point 
{
    use Translatable, Timestampable, CanBeDeactivated;

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


    /**
     * @ORM\ManyToOne(targetEntity="Country")
     */
    protected $country;

    /**
     * @ORM\ManyToOne(targetEntity="PointType")
     */
    protected $type;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $automatic;

    /**
     * @ORM\Column(type="string", unique=true, nullable=true)
     */
    protected $externalId;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    protected $latitude;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    protected $longitude;


    public function __toString()
    {
        return (string) $this->getName();
    }

    /**
     * @param mixed $externalId
     */
    public function setExternalId($externalId)
    {
        $this->externalId = $externalId;
    }

    /**
     * @return mixed
     */
    public function getExternalId()
    {
        return $this->externalId;
    }



    /**
     * @param mixed $automatic
     */
    public function setAutomatic($automatic)
    {
        $this->automatic = $automatic;
    }

    /**
     * @return mixed
     */
    public function getAutomatic()
    {
        return $this->automatic;
    }

    /**
     * @param mixed $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
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
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    public function __call($method, $arguments)
    {
        return $this->proxyCurrentLocaleTranslation($method, $arguments);
    }

    /**
     * @param mixed $latitude
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * @return mixed
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param mixed $longitude
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

    /**
     * @return mixed
     */
    public function getLongitude()
    {
        return $this->longitude;
    }


} 