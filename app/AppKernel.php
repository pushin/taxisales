<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        $bundles = array(
            // enable symfony-standard bundles
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),

            // enable cmf bundles
            new Doctrine\Bundle\PHPCRBundle\DoctrinePHPCRBundle(),
            new Symfony\Cmf\Bundle\RoutingBundle\CmfRoutingBundle(),
            new Symfony\Cmf\Bundle\CoreBundle\CmfCoreBundle(),
            new Knp\Bundle\MenuBundle\KnpMenuBundle(),
            new Symfony\Cmf\Bundle\MenuBundle\CmfMenuBundle(),
            new Symfony\Cmf\Bundle\ContentBundle\CmfContentBundle(),
            new Symfony\Cmf\Bundle\TreeBrowserBundle\CmfTreeBrowserBundle(),
            new Symfony\Cmf\Bundle\BlockBundle\CmfBlockBundle(),
            new Symfony\Cmf\Bundle\SimpleCmsBundle\CmfSimpleCmsBundle(),
            new Symfony\Cmf\Bundle\SeoBundle\CmfSeoBundle(),
            new Liip\SearchBundle\LiipSearchBundle(),
            new Symfony\Cmf\Bundle\SearchBundle\CmfSearchBundle(),
            new Symfony\Cmf\Bundle\MediaBundle\CmfMediaBundle(),
            new FM\ElfinderBundle\FMElfinderBundle(),

            // language switcher
            new Lunetics\LocaleBundle\LuneticsLocaleBundle(),

            // create.js editing related
            new Symfony\Cmf\Bundle\CreateBundle\CmfCreateBundle(),
            new FOS\RestBundle\FOSRestBundle(),
            new JMS\SerializerBundle\JMSSerializerBundle($this),

            // and the sandbox bundle
            new Sandbox\MainBundle\SandboxMainBundle(),
            new Sandbox\TestBundle\SandboxTestBundle(),

            // admin bundle
            new Sonata\jQueryBundle\SonatajQueryBundle(),
            new Sonata\BlockBundle\SonataBlockBundle(),
            new Sonata\CoreBundle\SonataCoreBundle(),
            new Sonata\AdminBundle\SonataAdminBundle(),
            new Sonata\DoctrinePHPCRAdminBundle\SonataDoctrinePHPCRAdminBundle(),
            new Sonata\SeoBundle\SonataSeoBundle(),
            new FOS\JsRoutingBundle\FOSJsRoutingBundle(),

            // Media support
            new Liip\ImagineBundle\LiipImagineBundle(),

            // jackalope doctrine caching
            new Doctrine\Bundle\DoctrineCacheBundle\DoctrineCacheBundle(),

            // block caching and feeds
            new Sonata\CacheBundle\SonataCacheBundle(),
            new Eko\FeedBundle\EkoFeedBundle(),

            new Sonata\EasyExtendsBundle\SonataEasyExtendsBundle(),

            new FOS\UserBundle\FOSUserBundle(),
            new Sonata\UserBundle\SonataUserBundle('FOSUserBundle'),

            new Sonata\DoctrineORMAdminBundle\SonataDoctrineORMAdminBundle(),

            new Application\Sonata\UserBundle\ApplicationSonataUserBundle(),

            new \Application\TaxiBundle\ApplicationTaxiBundle(),

//            new Prezent\Doctrine\TranslatableBundle\PrezentDoctrineTranslatableBundle(),

            new A2lix\TranslationFormBundle\A2lixTranslationFormBundle(),

            new Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle(),

            new Sensio\Bundle\BuzzBundle\SensioBuzzBundle(),

//            new JMS\SerializerBundle\JMSSerializerBundle(),
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
            $bundles[] = new \Sensio\Bundle\DistributionBundle\SensioDistributionBundle();

            // additional bundle for tests
            if ('test' === $this->getEnvironment()) {
                $bundles[] = new Liip\FunctionalTestBundle\LiipFunctionalTestBundle();
            }
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/config_'.$this->getEnvironment().'.yml');
    }

    /**
     * Fix bug with injecting request service in php cli
     */
    protected function initializeContainer()
    {
        parent::initializeContainer();
        if (PHP_SAPI == 'cli') {
            $this->getContainer()->enterScope('request');
            $this->getContainer()->set('request', new \Symfony\Component\HttpFoundation\Request(), 'request');
        }
    }
}
