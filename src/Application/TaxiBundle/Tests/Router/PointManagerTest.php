<?php
namespace Application\TaxiBundle\Tests\Router;

use Application\TaxiBundle\Entity\Point;
use Application\TaxiBundle\Router\PointManager;
use Application\TaxiBundle\Tests\ContainerAwareUnitTestCase;

class PointManagerTest extends RouterTestCase
{
    public function testRetrievePoint()
    {
        $this->truncatePoints();

        $points = new PointManager($this->get('doctrine')->getManager(), 'en');
        $point = $points->retrievePoint(array('id' => '1', 'name' => 'Test'));

        $this->assertEquals(1, $point->getExternalId());
        $this->assertEquals('Test', $point->translate('en')->getName());
        $this->assertEquals('Test', $point->translate('ru')->getName());

        $pointId = $point->getId();

        $points = new PointManager($this->get('doctrine')->getManager(), 'ru');
        $point = $points->retrievePoint(array('id' => '1', 'name' => 'Test ru'));

        $this->assertEquals($pointId, $point->getId());
        $this->assertEquals('Test', $point->translate('en')->getName());
        $this->assertEquals('Test ru', $point->translate('ru')->getName());

        $anotherPoint = $points->retrievePoint(array('id' => '2', 'name' => 'TestAnother ru'));

        $this->assertNotEquals($anotherPoint->getId(), $pointId);

        $this->truncatePoints();
    }
}