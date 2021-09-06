<?php

declare(strict_types = 1);

namespace Raid;

use Symfony\Component\Config\Exception\FileLocatorFileNotFoundException;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

/**
 * Application kernel
 */
class Kernel
{
    /**
     * Service container
     *
     * @var Container
     */
    private $container;

    /**
     * Constructor
     *
     * @param string $environment
     * @param string $appDir
     */
    public function __construct(string $environment, string $appDir)
    {
        $this->container = new ContainerBuilder();
        $loader          = new YamlFileLoader($this->container, new FileLocator($appDir . '/config/'));
        if ($environment === 'production') {
            $loader->load('services.yaml');
        } else {
            try {
                $loader->load(sprintf('services_%s.yaml', $environment));
            } catch (FileLocatorFileNotFoundException $e) {
                $loader->load('services.yaml');
            }
        }

        $commands = $this->container->findTaggedServiceIds('console.command');
        $console  = $this->container->getDefinition('application.console');

        $commandsList = [];
        foreach ($commands as $serviceId => $tagInfo) {
            $commandsList[] = new \Symfony\Component\DependencyInjection\Reference($serviceId);
        }
        $console->addMethodCall('addCommands', [$commandsList]);

        $this->container->compile();
    }

    /**
     * Returns service
     *
     * @param string $service
     *
     * @return object
     */
    public function getService(string $service)
    {
        return $this->container->get($service);
    }

    /**
     * Initiates execution
     *
     * @return void
     */
    public function exec(): void
    {
        $console = $this->getService('application.console');
        $console->run();
    }
}
