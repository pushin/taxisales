<?php
namespace Application\TaxiBundle\DoctrineBehaviors\Translatable;

trait Translatable
{
    use \Knp\DoctrineBehaviors\Model\Translatable\Translatable;

    public function translateWithoutDefault($locale = null)
    {
        if (null === $locale) {
            $locale = $this->getCurrentLocale();
        }

        $translation = $this->findTranslationByLocale($locale);
        if ($translation and !$translation->isEmpty()) {
            return $translation;
        }

        $class       = self::getTranslationEntityClass();
        $translation = new $class();
        $translation->setLocale($locale);

        $this->getNewTranslations()->set($translation->getLocale(), $translation);
        $translation->setTranslatable($this);

        return $translation;
    }

}