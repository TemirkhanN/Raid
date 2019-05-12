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
     * Identifier of raid-boss encounter
     *
     * @var null|string
     */
    private $raidId;

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

    /**
     * Returns raid identifier
     *
     * @return string|null
     */
    public function getRaidId(): ?string
    {
        return $this->raidId;
    }

    /**
     * Checks if party is participating in raid-boss encounter
     *
     * @return bool
     */
    public function isParticipatingInRaid(): bool
    {
        if ($this->raidId === null) {
            return false;
        }

        return true;
    }

    /**
     * Says party it participates in raid
     *
     * @param string $raidId
     *
     * @return void
     */
    public function participateInRaid(string $raidId): void
    {
        if ($this->isParticipatingInRaid()) {
            throw new \RuntimeException('Party is already participating in another raid');
        }

        $this->raidId = $raidId;
    }
}
