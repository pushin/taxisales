<?php
namespace Application\TaxiBundle\Router;

interface DirectionInterface 
{
    /**
     * @return integer
     */
    public function getDuration();

    /**
     * @return integer
     */
    public function getDistance();
}