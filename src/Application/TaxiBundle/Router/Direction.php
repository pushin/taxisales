<?php
namespace Application\TaxiBundle\Router;

class Direction implements DirectionInterface
{
    protected $duration;

    protected $distance;

    public function __construct($distance, $duration)
    {
        $this->distance = $distance;
        $this->duration = $duration;
    }

    public function getDuration()
    {
        return $this->duration;
    }

    public function getDistance()
    {
        return $this->distance;
    }

} 