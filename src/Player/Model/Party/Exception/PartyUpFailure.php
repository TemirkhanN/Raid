<?php

declare(strict_types=1);

namespace Raid\Player\Model\Party\Exception;

use Raid\Player\Model\Player;

class PartyUpFailure extends \DomainException
{
    public static function alreadyInOtherParty(Player $invited): self
    {
        $message = sprintf('"%s" is already in another party', $invited->getName());

        return new self($message);
    }

    public static function alreadyInParty(Player $player): self
    {
        $message = sprintf('"%s" is already in the same party with you', $player->getName());

        return new self($message);
    }

    public static function invitationMismatch(): self
    {
        return new self('This invitation is for another player');
    }

    public static function selfInviteAttempt(): self
    {
        return new self('You can not invite yourself');
    }
}
