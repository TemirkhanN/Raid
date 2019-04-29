<?php

declare(strict_types=1);

namespace Raid\Player\Model\Party\Exception;

use Raid\Player\Model\Player;

/**
 * Party making error
 */
class PartyUpFailure extends \DomainException
{
    /**
     * Creates error when invited player already in another party
     *
     * @param Player $invited
     *
     * @return PartyUpFailure
     */
    public static function alreadyInOtherParty(Player $invited): self
    {
        $message = sprintf('"%s" is already in another party', $invited->getName());

        return new self($message);
    }

    /**
     * Creates error when invited player already in the same party
     *
     * @param Player $player
     *
     * @return PartyUpFailure
     */
    public static function alreadyInParty(Player $player): self
    {
        $message = sprintf('"%s" is already in the same party with you', $player->getName());

        return new self($message);
    }

    /**
     * Creates error if invitation has been attempted to accept by wrong player
     *
     * @return PartyUpFailure
     */
    public static function invitationMismatch(): self
    {
        return new self('This invitation is for another player');
    }

    /**
     * Creates error on self invite attempt
     *
     * @return PartyUpFailure
     */
    public static function selfInviteAttempt(): self
    {
        return new self('You can not invite yourself');
    }
}
