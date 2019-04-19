<?php

declare(strict_types=1);

namespace Raid\Player\Command;

use Raid\AbstractCommandHandleTest;
use Raid\Player\Model\Player;

/**
 * Tests player creation
 */
class CreatePlayerHandlerTest extends AbstractCommandHandleTest
{
    /**
     * Tests player creation
     *
     * @return void
     */
    public function testCreatePlayer(): void
    {
        $command = new CreatePlayer('Tul', 123, 321, 1000);

        $this->runCommand($command);

        $player = $this->findPlayer('Tul');
        $this->assertEquals('Tul', $player->getName());
        $this->assertEquals(123, $player->getAttack());
        $this->assertEquals(321, $player->getDefence());
        $this->assertEquals(1000, $player->getMaxHealth());
        $this->assertEquals(1000, $player->getCurrentHealth());
    }

    /**
     * Retrieves player from repository
     *
     * @param string $name
     *
     * @return Player
     */
    private function findPlayer(string $name): Player
    {
        $playerRepository = $this->getService('raid.player.repository.player');

        $player = $playerRepository->findPlayerByName($name);

        $this->assertNotNull($player);

        return $player;
    }
}
