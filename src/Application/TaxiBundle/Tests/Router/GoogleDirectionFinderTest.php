<?php
namespace Application\TaxiBundle\Tests\Router;

use Application\TaxiBundle\Entity\Point;
use Application\TaxiBundle\Router\GoogleDirectionFinder;
use Application\TaxiBundle\Tests\ContainerAwareUnitTestCase;

class GoogleDirectionFinderTest extends ContainerAwareUnitTestCase
{
    /**
     * @dataProvider provider
     */
    public function testFind($origin, $destination, $expectedDistance, $expectedDuration)
    {
        $finder = new GoogleDirectionFinder($this->get('buzz'));

        list($latitude, $longitude) = explode(',', $origin);
        $originPoint = new Point();
        $originPoint->setLatitude($latitude);
        $originPoint->setLongitude($longitude);

        list($latitude, $longitude) = explode(',', $destination);
        $destinationPoint = new Point();
        $destinationPoint->setLatitude($latitude);
        $destinationPoint->setLongitude($longitude);

        $direction = $finder->find($originPoint, $destinationPoint);

        $this->assertLessThan($expectedDistance * 0.01, abs($expectedDistance - $direction->getDistance()));
        $this->assertLessThan($expectedDuration * 0.01, abs($expectedDuration - $direction->getDuration()));

    }

    public function provider()
    {
        return array(
            array('55.755826,37.6173', '56.8333333,53.18333329999996', 1192420, 56013),
        );
    }
} 