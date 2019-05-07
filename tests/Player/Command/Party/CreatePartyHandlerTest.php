<?php

declare(strict_types = 1);

namespace Raid\Player\Command\Party;

use Raid\AbstractCommandHandleTest;

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
}