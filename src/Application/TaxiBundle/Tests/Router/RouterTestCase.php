<?php
namespace Application\TaxiBundle\Tests\Router;

use Application\TaxiBundle\Tests\ContainerAwareUnitTestCase;

class RouterTestCase extends ContainerAwareUnitTestCase
{
    protected function cleanup()
    {
        $this->truncateRoutes();
        $this->truncatePoints();
    }

    protected function truncatePoints()
    {
        $this->truncateRepository('ApplicationTaxiBundle:Point');
    }
    protected function truncateRoutes()
    {
        $this->truncateRepository('ApplicationTaxiBundle:Route');
    }

} 