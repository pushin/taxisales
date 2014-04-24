<?php
namespace Application\TaxiBundle\Entity;

use Knp\DoctrineBehaviors\Model\Translatable\Translation;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class TransferTypeTranslation
{
    use Translation;

    /**
     * @ORM\Column
     */
    protected $name;

    /**
     * @ORM\Column(length=2000, nullable=true)
     */
    protected $description;

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

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    

} 