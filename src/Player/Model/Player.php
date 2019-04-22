<?php

declare(strict_types=1);

namespace Raid\Player\Model;

use Raid\Character\Model\CharacterInterface;
use Raid\Character\Model\CharacterTrait;
use Raid\Player\Model\Party\PartyInvitation;
use Raid\Character\ValueObject\CharacterPreset;

/**
 * Player
 */
class Player implements CharacterInterface
{
    use CharacterTrait;

    /**
     * Player party
     *
     * @var Party\Party|null
     */
    private $party;

    /**
     * Constructor
     *
     * @param CharacterPreset $playerPreset
     */
    public function __construct(CharacterPreset $playerPreset)
    {
        $this->name          = $playerPreset->getName();
        $this->attack        = $playerPreset->getAttack();
        $this->defence       = $playerPreset->getDefence();
        $this->maxHealth     = $playerPreset->getMaxHealth();
        $this->currentHealth = $this->maxHealth;
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
