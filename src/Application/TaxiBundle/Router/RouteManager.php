<?php
namespace Application\TaxiBundle\Router;

use Application\TaxiBundle\Entity\Point;
use Application\TaxiBundle\Entity\Route;
use Doctrine\ORM\EntityManager;

class RouteManager
{
    protected $points;
    protected $em;
    protected $finder;

    public function __construct(PointManager $points, EntityManager $em, DirectionFinderInterface $finder)
    {
        $this->em = $em;
        $this->points = $points;
        $this->finder = $finder;
    }

    public function getRoute($originPoint, $destinationPoint)
    {
        $origin = $this->points->retrievePoint($originPoint);
        $destination = $this->points->retrievePoint($destinationPoint);

        $route = $this->findRoute($origin, $destination);
        if (!$route) $route = $this->createRoute($origin, $destination);

        return $route;
    }

    protected function findRoute(Point $origin, Point $destination)
    {
        return $this->em->getRepository('ApplicationTaxiBundle:Route')->findOneBy(array(
            'origin' => $origin,
            'destination' => $destination,
        ));
    }

    protected function createRoute(Point $origin, Point $destination)
    {
        $direction = $this->finder->find($origin, $destination);

        if (!$direction) {
            throw new \Exception('Direction not found');
        }

        $route = new Route();
        $route->setOrigin($origin);
        $route->setDestination($destination);
        $route->setLength($direction->getDistance());
        $route->setTime($direction->getDuration());

        $this->em->persist($route);
        $this->em->flush();

        return $route;
    }

}