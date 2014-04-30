<?php
namespace Application\TaxiBundle\Router;

use Application\TaxiBundle\Entity\Point;
use Buzz\Browser;

class GoogleDirectionFinder implements  DirectionFinderInterface
{
    protected $browser;

    public function __construct(Browser $browser)
    {
        $this->browser = $browser;
    }

    /**
     * @param Point $origin
     * @param Point $destination
     * @return DirectionInterface
     */
    public function find(Point $origin, Point $destination)
    {
        $queryParameters = array(
            'mode' => 'driving',
            'origin' => "{$origin->getLatitude()},{$origin->getLongitude()}",
            'destination' => "{$destination->getLatitude()},{$destination->getLongitude()}",
            'sensor' => 'false',
        );

        $uri = "http://maps.googleapis.com/maps/api/directions/json?" . http_build_query($queryParameters);

        $response = $this->browser->get($uri);
        $data = json_decode($response->getContent(), true);

        $distance = $data['routes'][0]['legs'][0]['distance']['value'];
        $duration = $data['routes'][0]['legs'][0]['duration']['value'];

        return new Direction($distance, $duration);
    }

} 