<?php

declare(strict_types=1);

namespace Raid\Player\Model;

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
     * @throws \DomainException
     */
    public function acceptPartyInvitation(Party\PartyInvitation $invitation): void
    {
        if ($this->party !== null) {
            throw new \DomainException(sprintf('"%s" is already in another party', $this->getName()));
        }

        if (!$invitation->isInviting($this)) {
            throw new \DomainException('This invitation is for another player');
        }

        $party = $invitation->getParty();
        $party->addPlayer($this);
        $this->party = $party;
    }

    /**
     * Invites player to the party
     *
     * @param Player $invitedPlayer
     *
     * @return void
     *
     * @throws \DomainException
     */
    public function inviteToParty(Player $invitedPlayer): void
    {
        if ($invitedPlayer === $this) {
            throw new \DomainException('You can not invite yourself');
        }

        if ($this->party === null) {
            $this->party = new Party\Party($this);
        } else {
            if ($this->party->hasPlayer($invitedPlayer)) {
                throw new \DomainException(
                    sprintf('"%s" is already in the same party with you', $invitedPlayer->getName())
                );
            }
        }

        $invitation = new Party\PartyInvitation($this->party, $invitedPlayer);

        // TODO another player should accept but MVP has no time for prelude
        $invitedPlayer->acceptPartyInvitation($invitation);
    }
}
