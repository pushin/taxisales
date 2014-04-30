<?php
namespace Application\TaxiBundle\Tests\Router;

use Application\TaxiBundle\Entity\Point;
use Application\TaxiBundle\Router\GoogleDirectionFinder;
use Application\TaxiBundle\Router\PointManager;
use Application\TaxiBundle\Router\RouteManager;
use Application\TaxiBundle\Tests\ContainerAwareUnitTestCase;

class RouteManagerTest extends RouterTestCase
{
    public function testGetRoute()
    {
        $this->cleanup();

        $origin = array(
            'id' => '1a0f08fcbc047354782f00ab52e66fb56d1aadf7',
            'name' => 'Москва',
            'latitude' => 55.755826,
            'longitude' => 37.6173,
        );
        $destination = array(
            'id' => '6a5ce470770719d7ee2dda5b29b1ccec71f46cf0',
            'name' => 'Ижевск',
            'latitude' => 56.8333333,
            'longitude' => 53.18333329999996,
        );


        $routes = $this->createRouteManager();

        $route = $routes->getRoute($origin, $destination);

        $expectedDistance = 1192420;
        $expectedDuration = 56013;
        $this->assertLessThan($expectedDistance * 0.01, abs($expectedDistance - $route->getLength()));
        $this->assertLessThan($expectedDuration * 0.01, abs($expectedDuration - $route->getTime()));

        $routeId = $route->getId();
        $this->assertEquals($routeId, $this->createRouteManager()->getRoute($origin, $destination)->getId());

        $this->cleanup();
    }

    protected function createRouteManager()
    {
        $em = $this->get('doctrine')->getManager();
        $points = new PointManager($em, 'en');
        $finder = new GoogleDirectionFinder($this->get('buzz'));

        return new RouteManager($points, $em, $finder);
    }

}