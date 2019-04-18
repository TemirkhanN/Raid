<?php

declare(strict_types=1);

namespace Raid\Player\Model;

use Raid\Player\Model\Party\PartyInvitation;
use Raid\Player\ValueObject\PlayerPreset;

/**
 * Player
 */
class Player
{
    /**
     * Name
     *
     * @var string
     */
    private $name;

    /**
     * Attack rate
     *
     * @var int
     */
    private $attack;

    /**
     * Defence rate
     *
     * @var int
     */
    private $defence;

    /**
     * Current health amount
     *
     * @var int
     */
    private $currentHealth;

    /**
     * Maximum health amount
     *
     * @var int
     */
    private $maxHealth;

    /**
     * Player party
     *
     * @var Party\Party|null
     */
    private $party;

    /**
     * Constructor
     *
     * @param PlayerPreset $playerPreset
     */
    public function __construct(PlayerPreset $playerPreset)
    {
        $this->name          = $playerPreset->getName();
        $this->attack        = $playerPreset->getAttack();
        $this->defence       = $playerPreset->getDefence();
        $this->maxHealth     = $playerPreset->getMaxHealth();
        $this->currentHealth = $this->maxHealth;
    }

    /**
     * Returns name
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Returns attack rate
     *
     * @return int
     */
    public function getAttack(): int
    {
        return $this->attack;
    }

    /**
     * Returns defence rate
     *
     * @return int
     */
    public function getDefence(): int
    {
        return $this->defence;
    }

    /**
     * Returns current health amount
     *
     * @return int
     */
    public function getCurrentHealth(): int
    {
        return $this->currentHealth;
    }

    /**
     * Returns max health amount
     *
     * @return int
     */
    public function getMaxHealth(): int
    {
        return $this->maxHealth;
    }

    /**
     * Accepts party invitation
     *
     * @param Party\PartyInvitation $invitation
     *
     * @return void
     *
     * @throws Party\Exception\PartyUpFailure
     */
    public function acceptPartyInvitation(Party\PartyInvitation $invitation): void
    {
        if ($this->party !== null) {
            throw Party\Exception\PartyUpFailure::alreadyInOtherParty($this);
        }

        if (!$invitation->isInviting($this)) {
            throw Party\Exception\PartyUpFailure::invitationMismatch();
        }

        $party = $invitation->getParty();
        $party->addPlayer($this);
        $this->party = $party;
    }

    /**
     * Invites player to the party
     *
     * @param Player $player
     *
     * @return PartyInvitation
     *
     * @throws Party\Exception\PartyUpFailure
     */
    public function inviteToParty(Player $player): PartyInvitation
    {
        if ($player === $this) {
            throw Party\Exception\PartyUpFailure::selfInviteAttempt();
        }

        if ($this->party === null) {
            $this->party = new Party\Party($this);
        } else {
            if ($this->party->hasPlayer($player)) {
                throw Party\Exception\PartyUpFailure::alreadyInParty($player);
            }
        }

        return $this->party->invite($player);
    }
}
