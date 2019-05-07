<?php

declare(strict_types = 1);

namespace Raid\Boss\Command;

use Raid\AbstractCommandHandleTest;

/**
 * Tests raid initiation
 */
class StartRaidHandlerTest extends AbstractCommandHandleTest
{
    /**
     * Tests raid initiation
     *
     * @return void
     */
    public function testRaidInitiation(): void
    {
        $this->createPlayer('Tul');
        $this->createBoss('Beorn');

        $command = new StartRaid('Tul', 'Beorn');

        $this->runCommand($command);

        $player = $this->findPlayer('Tul');
        $this->assertNotNull($player);

        $raid = $this->findRaid($player->getParty());
        $this->assertNotNull($raid);

        $boss = $raid->getBoss();
        $this->assertEquals($boss->getName(), 'Beorn');
    }
}
