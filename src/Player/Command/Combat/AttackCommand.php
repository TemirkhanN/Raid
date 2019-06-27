<?php

declare(strict_types = 1);

namespace Raid\Player\Command\Combat;

use League\Tactician\Plugins\NamedCommand\NamedCommand;

/**
 * Command for player to attack boss
 */
class AttackCommand implements NamedCommand
{
    /**
     * Player name
     *
     * @var string
     */
    private $playerName;

    /**
     * Constructor
     *
     * @param string $playerName
     */
    public function __construct(string $playerName)
    {
        $this->playerName = $playerName;
    }

    /**
     * Returns player name
     *
     * @return string
     */
    public function getPlayerName(): string
    {
        return $this->playerName;
    }

    /**
     * Returns command name
     *
     * @return string
     */
    public function getCommandName(): string
    {
        return 'attack_boss';
    }
}
