<?php
namespace Application\TaxiBundle\Tests\Router;

use Application\TaxiBundle\Entity\Point;
use Application\TaxiBundle\Router\PointManager;
use Application\TaxiBundle\Tests\ContainerAwareUnitTestCase;
use Symfony\Component\HttpFoundation\Request;

class PointManagerTest extends RouterTestCase
{
    public function testRetrievePoint()
    {
        $this->truncatePoints();

        $request = new Request();
        $request->setLocale('en');

        $points = new PointManager($this->get('doctrine')->getManager(), $request);
        $point = $points->retrievePoint(array('id' => '1', 'name' => 'Test'));

        $this->assertEquals(1, $point->getExternalId());
        $this->assertEquals('Test', $point->translate('en')->getName());
        $this->assertEquals('Test', $point->translate('ru')->getName());

        $pointId = $point->getId();

        $request->setLocale('ru');
        $points = new PointManager($this->get('doctrine')->getManager(), $request);
        $point = $points->retrievePoint(array('id' => '1', 'name' => 'Test ru'));

        $this->assertEquals($pointId, $point->getId());
        $this->assertEquals('Test', $point->translate('en')->getName());
        $this->assertEquals('Test ru', $point->translate('ru')->getName());

        $anotherPoint = $points->retrievePoint(array('id' => '2', 'name' => 'TestAnother ru'));

        $this->assertNotEquals($anotherPoint->getId(), $pointId);
die;
        $this->truncatePoints();
    }
}