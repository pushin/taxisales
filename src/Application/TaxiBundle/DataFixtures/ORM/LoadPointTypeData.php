<?php
namespace Application\TaxiBundle\DataFixtures\ORM;

use Application\TaxiBundle\Entity\PointType;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadPointTypeData implements FixtureInterface
{
    /** @var  \Doctrine\ORM\EntityManager */
    protected $manager;

    public function load(ObjectManager $manager)
    {
        $this->manager = $manager;
        $this->createPointType(array(
            'code' => 'city',
            'translation' => array(
                'ru' => 'Город',
                'en' => 'City'
            )
        ));
        $this->createPointType(array(
            'code' => 'airport',
            'translation' => array(
                'ru' => 'Аэропорт',
                'en' => 'Airport'
            )
        ));
        $this->createPointType(array(
            'code' => 'railway_station',
            'translation' => array(
                'ru' => 'Вокзал',
                'en' => 'Railway station'
            )
        ));
        $this->createPointType(array(
            'code' => 'port',
            'translation' => array(
                'ru' => 'Порт',
                'en' => 'Port'
            )
        ));
        $this->createPointType(array(
            'code' => 'hotel',
            'translation' => array(
                'ru' => 'Гостиница',
                'en' => 'Hotel'
            )
        ));
    }

    public function createPointType($data)
    {
        $code = $data['code'];
        if (!$code) return;

        if ($this->manager->getRepository('ApplicationTaxiBundle:PointType')->findBy(array(
            'code' => $code
        ))) return;

        $type = new PointType();
        $type->setCode($code);

        foreach($data['translation'] as $locale => $value) {
            $type->translate($locale)->setName($value);
        }

        $this->manager->persist($type);
        $type->mergeNewTranslations();
        $this->manager->flush();
    }
} 