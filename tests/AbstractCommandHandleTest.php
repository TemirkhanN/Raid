<?php

declare(strict_types = 1);

namespace Raid;

use PHPUnit\Framework\TestCase;
use Raid\Character\ValueObject\CharacterPreset;
use Raid\Player\Model\Player;

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
    protected function setUp(): void
    {
        parent::setUp();

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

    /**
     * Creates player
     *
     * @param string $playerName
     *
     * @return Player
     */
    protected function createPlayer(string $playerName): Player
    {
        $playerPreset = new CharacterPreset($playerName, 123, 321, 100);
        $player       = new Player($playerPreset);

        $playerRepository = $this->getService('raid.player.repository.player');
        $playerRepository->savePlayer($player);

        return $player;
    }

    /**
     * Retrieves player
     *
     * @param string $name
     *
     * @return ?Player
     */
    protected function findPlayer(string $name): ?Player
    {
        $playerRepository = $this->getService('raid.player.repository.player');

        return $playerRepository->findPlayerByName($name);
    }
}
