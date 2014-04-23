<?php
namespace Application\TaxiBundle\Admin\Base;

use Knp\DoctrineBehaviors\Model\Translatable\Translatable;
use Sonata\AdminBundle\Exception\NoValueException;
use Sonata\DoctrineORMAdminBundle\Admin\FieldDescription;

class TranslatableFieldDescription extends FieldDescription
{
    public function getFieldValue($object, $fieldName)
    {
        $camelizedFieldName = self::camelize($fieldName);

        $getters = array();
        $parameters = array();

        // prefer method name given in the code option
        if ($this->getOption('code')) {
            $getters[] = $this->getOption('code');
        }
        // parameters for the method given in the code option
        if($this->getOption('parameters')){
            $parameters = $this->getOption('parameters');
        }
        $getters[] = 'get' . $camelizedFieldName;
        $getters[] = 'is' . $camelizedFieldName;

        foreach ($getters as $getter) {
            if (method_exists($object, $getter)) {
                return call_user_func_array(array($object, $getter),$parameters);
            }
        }

        if (method_exists($object, 'getTranslations')) {
            $translation = $object->getTranslations()->first();
            foreach ($getters as $getter) {
                if (method_exists($translation, $getter)) {
                    return call_user_func_array(array($translation, $getter),$parameters);
                }
            }
        }

        if (isset($object->{$fieldName})) {
            return $object->{$fieldName};
        }

        throw new NoValueException(sprintf('Unable to retrieve the value of `%s`', $this->getName()));

    }

}