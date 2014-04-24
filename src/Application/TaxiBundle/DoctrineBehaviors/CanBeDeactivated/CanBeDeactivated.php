<?php
namespace Application\TaxiBundle\DoctrineBehaviors\CanBeDeactivated;

trait CanBeDeactivated
{
    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $active = true;

    public function isActive()
    {
        return $this->active;
    }

    public function setActive($active)
    {
        $this->active = $active;
        return $this;
    }
}
