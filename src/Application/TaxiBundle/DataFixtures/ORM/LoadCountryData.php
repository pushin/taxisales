<?php
namespace Application\TaxiBundle\DataFixtures\ORM;

use Application\TaxiBundle\Entity\Country;
use Application\TaxiBundle\Entity\PointType;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\Util\Debug;

class LoadCountryData implements FixtureInterface
{
    /** @var  \Doctrine\ORM\EntityManager */
    protected $manager;

    public function load(ObjectManager $manager)
    {
        $this->manager = $manager;
        $this->createCountry(array(
            'translation' => array(
                'ru' => 'Россия',
                'en' => 'Россия'
            )
        ));

    }

    public function createCountry($data)
    {
        $translation = $data['translation'];
        $name = array_shift($translation);
        $keys = array_keys($data['translation']);
        $locale = array_shift($keys);

        $query = $this->manager->getRepository('ApplicationTaxiBundle:Country')->createQueryBuilder('c')
            ->leftJoin('c.translations', 't')
            ->where('t.name = :name AND t.locale = :locale')
            ->setMaxResults(1)
            ->setParameters(array(':name' => $name, ':locale' => $locale))
            ->getQuery()
        ;
        $existCountry = $query->getOneOrNullResult();

        if ($existCountry) return;

        $type = new Country();

        foreach($data['translation'] as $locale => $value) {
            $type->translate($locale)->setName($value);
        }

        $this->manager->persist($type);
        $type->mergeNewTranslations();
        $this->manager->flush();
    }
} 