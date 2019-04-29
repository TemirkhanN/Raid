<?php

declare(strict_types = 1);

namespace Raid\Player\Command\Party;

use Raid\AbstractCommandHandleTest;
use Raid\Character\ValueObject\CharacterPreset;
use Raid\Player\Model\Player;

/**
 * Party creation tests
 */
class CreatePartyHandlerTest extends AbstractCommandHandleTest
{
    /**
     * Tests party creation
     *
     * @return void
     */
    public function testCreateParty(): void
    {
        $partyLeader = $this->createPlayer('PartyLeader');
        $this->assertNull($partyLeader->getParty());
        $somePlayer = $this->createPlayer('SomePlayer');

        $command = new CreateParty('PartyLeader', 'SomePlayer');
        $this->runCommand($command);

        $party = $partyLeader->getParty();
        $this->assertNotNull($party);
        $this->assertTrue($party->hasPlayer($somePlayer));
        $this->assertSame($party, $somePlayer->getParty());
    }

    /**
     * Creates player
     *
     * @param string $playerName
     *
     * @return Player
     */
    private function createPlayer(string $playerName): Player
    {
        $playerPreset = new CharacterPreset($playerName, 123, 321, 100);
        $player       = new Player($playerPreset);

        $playerRepository = $this->getService('raid.player.repository.player');

        $playerRepository->savePlayer($player);

        return $player;
    }
}