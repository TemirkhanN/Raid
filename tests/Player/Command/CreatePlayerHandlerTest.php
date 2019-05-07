<?php

declare(strict_types=1);

namespace Raid\Player\Command;

use Raid\AbstractCommandHandleTest;

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
        $this->assertNotNull($player);
        $this->assertEquals('Tul', $player->getName());
        $this->assertEquals(123, $player->getAttack());
        $this->assertEquals(321, $player->getDefence());
        $this->assertEquals(1000, $player->getMaxHealth());
        $this->assertEquals(1000, $player->getCurrentHealth());
    }
}
