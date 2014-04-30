<?php
namespace Application\TaxiBundle\Router;

use Application\TaxiBundle\Entity\Point;

interface DirectionFinderInterface
{
    /**
     * @param Point $origin
     * @param Point $destination
     * @return DirectionInterface
     */
    public function find(Point $origin, Point $destination);
} 