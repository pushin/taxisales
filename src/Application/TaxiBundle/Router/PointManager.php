<?php
namespace Application\TaxiBundle\Router;

use Application\TaxiBundle\Entity\Point;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Request;

class PointManager
{
    protected $locale;
    protected $em;
    protected $repository;

    public function __construct(EntityManager $em, Request $request)
    {
        $this->em = $em;
        $this->locale = $request->getLocale();
        $this->repository = $em->getRepository('ApplicationTaxiBundle:Point');
    }

    public function retrievePoint($data)
    {
        $id = $data['id'];
        $name = isset($data['name']) ? $data['name'] : null;

        $point = $this->repository->findOneBy(array('externalId' => $id));
        if (!$point) {
            $point = new Point();
            $point->setExternalId($id);
            $point->setAutomatic(true);
            if (isset($data['latitude'])) $point->setLatitude($data['latitude']);
            if (isset($data['longitude'])) $point->setLongitude($data['longitude']);
        }

        if ($name && !$point->translateWithoutDefault($this->locale)->getName()) {
            $point->translateWithoutDefault($this->locale)->setName($name);
            $point->mergeNewTranslations();
        }

        $this->em->persist($point);
        $this->em->flush();

        return $point;

    }

}