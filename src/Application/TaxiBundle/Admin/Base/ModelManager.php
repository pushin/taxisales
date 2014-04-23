<?php
namespace Application\TaxiBundle\Admin\Base;

use Sonata\DoctrineORMAdminBundle\Model\ModelManager as SonataOrmModelManager;
use Sonata\DoctrineORMAdminBundle\Admin\FieldDescription;

class ModelManager extends SonataOrmModelManager
{
    public function getNewFieldDescriptionInstance($class, $name, array $options = array())
    {
        if (!is_string($name)) {
            throw new \RunTimeException('The name argument must be a string');
        }

        if (!isset($options['route']['name'])) {
            $options['route']['name'] = 'edit';
        }

        if (!isset($options['route']['parameters'])) {
            $options['route']['parameters'] = array();
        }

        list($metadata, $propertyName, $parentAssociationMappings) = $this->getParentMetadataForProperty($class, $name);

        $fieldDescription = new TranslatableFieldDescription;
        $fieldDescription->setName($name);
        $fieldDescription->setOptions($options);
        $fieldDescription->setParentAssociationMappings($parentAssociationMappings);

        if (isset($metadata->associationMappings[$propertyName])) {
            $fieldDescription->setAssociationMapping($metadata->associationMappings[$propertyName]);
        }

        if (isset($metadata->fieldMappings[$propertyName])) {
            $fieldDescription->setFieldMapping($metadata->fieldMappings[$propertyName]);
        }

        return $fieldDescription;
    }

} 