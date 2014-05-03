<?php

namespace Application\TaxiBundle\Controller;

use Application\TaxiBundle\Router\RouteManager;
use JMS\Serializer\SerializationContext;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class OrderController extends Controller
{
    public function indexAction(Request $request)
    {
        return new Response(123);
    }
}
