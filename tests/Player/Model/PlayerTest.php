<?php

declare(strict_types=1);

namespace Raid\Player\Model;

use PHPUnit\Framework\TestCase;
use Raid\Player\Model\Party\Exception\PartyUpFailure;
use Raid\Player\Model\Party\Party;
use Raid\Player\Model\Party\PartyInvitation;
use Raid\Player\ValueObject\PlayerPreset;

/**
 * Tests player model
 */
class PlayerTest extends TestCase
{
    private $player;

    /**
     * Setup environment
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->player = $this->createPlayer('Some Folk');
    }

    /**
     * Clear environment
     *
     * @return void
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        $this->player = null;
    }

    /**
     * Tests self-invite attempt
     *
     * @return void
     */
    public function testSelfInvitation(): void
    {
        $this->expectException(PartyUpFailure::class);
        $this->expectExceptionMessage('You can not invite yourself');

        $this->player->inviteToParty($this->player);
    }

    /**
     * Tests attempt to make party with player that has already joined the same party with you
     *
     * @return void
     */
    public function testInviteToPartyPlayerThatAlreadyJoinedSameParty(): void
    {
        $anotherPlayer = $this->createPlayer('Another Folk');
        $invitation = $this->player->inviteToParty($anotherPlayer);
        $anotherPlayer->acceptPartyInvitation($invitation);

        $this->expectException(PartyUpFailure::class);
        $this->expectExceptionMessage('"Another Folk" is already in the same party with you');

        $invitation = $this->player->inviteToParty($anotherPlayer);
        $anotherPlayer->acceptPartyInvitation($invitation);
    }

    /**
     * Tests attempt to make party with player that already has party
     *
     * @return void
     */
    public function testInviteToPartyPlayerThatAlreadyHasParty(): void
    {
        $anotherPlayer = $this->createPlayerThatHasJoinedSomeParty('Another Folk');

        $this->expectException(PartyUpFailure::class);
        $this->expectExceptionMessage('"Another Folk" is already in another party');

        $invitation = $this->player->inviteToParty($anotherPlayer);
        $anotherPlayer->acceptPartyInvitation($invitation);
    }

    /**
     * Tests situation when player attempts invitation that was created for another player
     *
     * @return void
     */
    public function testAttemptAcceptInvitationThatWasNotIntendedForPlayer(): void
    {
        $invitation = $this->createMock(PartyInvitation::class);
        $invitation
            ->expects($this->once())
            ->method('isInviting')
            ->with($this->identicalTo($this->player))
            ->willReturn(false);

        $this->expectException(PartyUpFailure::class);
        $this->expectExceptionMessage('This invitation is for another player');

        $this->player->acceptPartyInvitation($invitation);
    }

    /**
     * Creates player
     *
     * @param string $name
     *
     * @return Player
     */
    private function createPlayer(string $name): Player
    {
        $preset = new PlayerPreset($name, 123, 321, 456);

        return new Player($preset);
    }

    /**
     * Creates player that has joined some party
     *
     * @param string $playerName
     *
     * @return Player
     */
    private function createPlayerThatHasJoinedSomeParty(string $playerName): Player
    {
        $invitedPlayer = $this->createPlayer($playerName);
        $somePlayer    = $this->createPlayer('Some Random Folk');
        $party         = new Party($somePlayer);
        $invitation    = $party->invite($invitedPlayer);
        $invitedPlayer->acceptPartyInvitation($invitation);

        return $invitedPlayer;
    }
}
