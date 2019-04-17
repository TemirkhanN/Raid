<?php

declare(strict_types=1);

namespace Raid\Player\Model\Party;

use Raid\Player\Model\Player;

/**
 * Party
 */
class Party
{
    /**
     * Players in current party
     *
     * @var \SplObjectStorage
     */
    private $players;

    /**
     * Constructor
     *
     * @param Player $leader
     */
    public function __construct(Player $leader)
    {
        $this->players = new \SplObjectStorage();
        $this->players->attach($leader);
    }

    /**
     * Checks if player belongs to this party
     *
     * @param Player $player
     *
     * @return bool
     */
    public function hasPlayer(Player $player): bool
    {
        return $this->players->contains($player);
    }

    /**
     * Adds new player to the party
     *
     * @param Player $player
     *
     * @return void
     */
    public function addPlayer(Player $player): void
    {
        if ($this->hasPlayer($player)) {
            return;
        }

        $this->players->attach($player);
    }

    /**
     * Invites player to the party
     *
     * @param Player $player
     *
     * @return PartyInvitation
     */
    public function invite(Player $player): PartyInvitation
    {
        return new PartyInvitation($this, $player);
    }
}