<?php

declare(strict_types = 1);

namespace Raid;

use Symfony\Component\Config\Exception\FileLocatorFileNotFoundException;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Console\Application;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Dotenv\Dotenv;

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

    public function __construct(string $appDir)
    {
        $envFile = realpath($appDir .'/.env');
        if ($envFile !== false) {
            $dotenv = new Dotenv();
            $dotenv->bootEnv($envFile);
        }

        $this->container = new ContainerBuilder();
        $loader          = new YamlFileLoader($this->container, new FileLocator($appDir . '/config/'));

        $env = $_ENV['APP_ENV'] ?? $_SERVER['APP_ENV'] ?? 'dev';

        try {
            $loader->load(sprintf('services_%s.yaml', $env));
        } catch (FileLocatorFileNotFoundException $e) {
            $loader->load('services.yaml');
        }

        $commands = $this->container->findTaggedServiceIds('console.command');
        $console  = $this->container->getDefinition(Application::class);

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
        $console = $this->getService(Application::class);
        $console->run();
    }
}
