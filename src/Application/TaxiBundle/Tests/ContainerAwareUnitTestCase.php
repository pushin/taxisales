<?php
namespace Application\TaxiBundle\Tests;

require_once __DIR__.'/../../../../app/AppKernel.php';

class ContainerAwareUnitTestCase  extends \PHPUnit_Framework_TestCase
{
    protected static $kernel;
    protected static $container;

    public static function setUpBeforeClass()
    {
        self::$kernel = new \AppKernel('test', true);
        self::$kernel->boot();

        self::$container = self::$kernel->getContainer();
    }

    public function get($serviceId)
    {
        return self::$kernel->getContainer()->get($serviceId);
    }

    protected function truncateRepository($className)
    {
        $em = $this->get('doctrine')->getManager();
        $cmd = $em->getClassMetadata($className);
        /** @var \Doctrine\DBAL\Connection $connection */
        $connection = $em->getConnection();
        $connection->query("DELETE FROM {$cmd->getTableName()}")->execute();
    }

} 