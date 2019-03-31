<?php

declare(strict_types=1);

namespace Raid\Player\Model\Party;

use Raid\Player\Model\Player;

/**
 * Party invitation
 */
class PartyInvitation
{
    /**
     * Party
     *
     * @var Party
     */
    private $party;

    /**
     * Player that has been invited to party
     *
     * @var Player
     */
    private $invitedPlayer;

    /**
     * Constructor
     *
     * @param Party  $party
     * @param Player $invitedPlayer
     */
    public function __construct(Party $party, Player $invitedPlayer)
    {
        $this->party         = $party;
        $this->invitedPlayer = $invitedPlayer;
    }

    /**
     * Returns party
     *
     * @return Party
     */
    public function getParty(): Party
    {
        return $this->party;
    }

    /**
     * Checks if passed player is invited by this invitation
     *
     * @param Player $player
     *
     * @return bool
     */
    public function isInviting(Player $player): bool
    {
        if ($this->invitedPlayer === $player) {
            return true;
        }

        return false;
    }
}
