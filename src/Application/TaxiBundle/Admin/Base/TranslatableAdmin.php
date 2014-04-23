<?php
namespace Application\TaxiBundle\Admin\Base;

use Sonata\AdminBundle\Admin\Admin;
use Symfony\Component\HttpFoundation\Request;

class TranslatableAdmin extends Admin
{
    protected $locale;

    public function __construct($code, $class, $baseControllerName, Request $request)
    {
        parent::__construct($code, $class, $baseControllerName);
        $this->locale = $request->getLocale();
    }

    public function createQuery($context = 'list')
    {
        $query = parent::createQuery($context);
        if ($context === 'list') $this->modifyListQuery($query);
        return $query;
    }

    /**
     * @param Query $query
     */
    protected function modifyListQuery($query)
    {
        $alias = $query->getRootAlias();
        $query
            ->addSelect('t')
            ->leftJoin("{$alias}.translations", 't', 'WITH', 't.locale = :locale')
            ->setParameter('locale', $this->locale)
        ;
    }

} 