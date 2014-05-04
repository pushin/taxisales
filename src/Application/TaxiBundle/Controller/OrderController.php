<?php

namespace Application\TaxiBundle\Controller;

use Application\TaxiBundle\Router\RouteManager;
use JMS\Serializer\SerializationContext;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class OrderController extends Controller
{
    public function blockAction(Request $request)
    {
        $em = $this->get('doctrine')->getManager();
        $route = $em->find('ApplicationTaxiBundle:Route', $request->get('route'));

        return $this->render('ApplicationTaxiBundle:Order:block.html.twig', array(
            'route' => $route,
        ));
    }
}
