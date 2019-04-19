<?php

declare(strict_types = 1);

namespace Raid;

use PHPUnit\Framework\TestCase;

/**
 * Abstract command bus test-suite
 */
abstract class AbstractCommandHandleTest extends TestCase
{
    /**
     * Kernel
     *
     * @var Kernel
     */
    private static $kernel;

    /**
     * Set test-suite env
     *
     * @return void
     */
    public static function setUpBeforeClass(): void
    {
        parent::setUpBeforeClass();

        self::$kernel = new \Raid\Kernel('test', dirname(__DIR__));
    }

    /**
     * Unset test-suite env
     *
     * @return void
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        self::$kernel = null;
    }

    /**
     * Executes command
     *
     * @param object $command
     *
     * @return void
     */
    protected function runCommand($command): void
    {
        self::$kernel->getService('raid.command.bus')->handle($command);
    }

    /**
     * Retrieves service from container
     *
     * @param string $service
     *
     * @return object
     */
    protected function getService(string $service)
    {
        return self::$kernel->getService($service);
    }
}