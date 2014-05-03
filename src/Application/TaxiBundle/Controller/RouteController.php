<?php

namespace Application\TaxiBundle\Controller;

use Application\TaxiBundle\Router\RouteManager;
use JMS\Serializer\SerializationContext;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class RouteController extends Controller
{
    public function findMaintainableRouteAction(Request $request)
    {
        $origin = $request->get('origin');
        $destination = $request->get('destination');

        $route = $this->getRouteManager()->getRoute($origin, $destination);

        return new Response($this->getSerializer()->serialize($route, 'json'));
    }

    /**
     * @return RouteManager
     */
    protected function getRouteManager()
    {
        return $this->get('taxi.routes');
    }

    /**
     * @return \JMS\Serializer\Serializer
     */
    protected function getSerializer()
    {
//        return $this->get('jms_serializer');
        return $this->get('serializer');
    }
}
