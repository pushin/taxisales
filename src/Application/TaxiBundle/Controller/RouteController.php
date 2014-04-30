<?php

namespace Application\TaxiBundle\Controller;

use Application\TaxiBundle\Router\RouteManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route('/api/route')
 */
class RouteController extends Controller
{
    /**
     * @Route(/findMaintainableRoute, name="find_maintainable_route")
     * @Method("POST")
     */
    public function findMaintainableRouteAction(Request $request)
    {
        $origin = $request->get('origin');
        $destination = $request->get('destination');

        $route = $this->getRouteManager()->getRoute($origin, $destination);

        return new Response($route->getId());
    }

    /**
     * @return RouteManager
     */
    protected function getRouteManager()
    {
        return $this->get('taxi.routes');
    }
}
