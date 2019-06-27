<?php

declare(strict_types = 1);

namespace Raid\Player\Command\Exception;

/**
 * Invalid arguments exception for player commands
 */
class InvalidArgumentException extends \InvalidArgumentException
{
    /**
     * Error code for uknown player name
     *
     * @const int
     */
    public const CODE_UNKNOWN_PLAYER = 1;

    /**
     * Create exception of unknown player
     *
     * @param string $playerName
     *
     * @return InvalidArgumentException
     */
    public static function unknownPlayerName(string $playerName): self
    {
        $message = sprintf('Player "%s" does not exist', $playerName);

        return new self($message, self::CODE_UNKNOWN_PLAYER);
    }
}
