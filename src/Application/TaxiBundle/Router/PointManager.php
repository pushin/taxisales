<?php
namespace Application\TaxiBundle\Router;

use Application\TaxiBundle\Entity\Point;
use Doctrine\ORM\EntityManager;

class PointManager
{
    protected $locale;

    protected $em;

    public function __construct(EntityManager $em, $locale)
    {
        $this->em = $em;
        $this->locale = $locale;
    }

    public function retrievePoint($data)
    {
        $id = $data['id'];
        $name = isset($data['name']) ? $data['name'] : null;

        $point = $this->repository->findOneBy(array('externalId' => $id));
        if (!$point) {
            $point = new Point();
            $point->setExternalId($id);
        }

        if ($name && !$point->translate($this->locale)->getName()) {
            $point->translate($this->locale)->setName($name);
            $point->mergeNewTranslations();
        }

        $this->em->persist($point);
        $this->em->flush();

        return $point;

    }

}