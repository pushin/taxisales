<?php
namespace Application\TaxiBundle\Router;

use Doctrine\ORM\EntityManager;

class RouteManager
{
    protected $points;
    protected $em;

    public function __construct(PointManager $points, EntityManager $em)
    {
        $this->em = $em;
        $this->points = $points;
    }

    public function getRoute($originPoint, $destinationPoint)
    {
        $origin = $this->points->retrievePoint($originPoint);
        $destination = $this->points->retrievePoint($destinationPoint);
    }
}