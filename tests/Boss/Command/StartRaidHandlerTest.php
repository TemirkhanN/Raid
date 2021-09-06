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
        $this->createBoss('Beorn');

        $player1 = $this->createPlayer('Tul');
        $player2 = $this->createPlayer('Gon');
        $invitation = $player1->inviteToParty($player2);
        $player2->acceptPartyInvitation($invitation);

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
