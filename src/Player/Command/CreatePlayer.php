<?php

declare(strict_types=1);

namespace Raid\Player\Command;

use League\Tactician\Plugins\NamedCommand\NamedCommand;

/**
 * Player creation command
 */
class CreatePlayer implements NamedCommand
{
    /**
     * Player name
     *
     * @var string
     */
    private $playerName;

    /**
     * Player attack rate
     *
     * @var int
     */
    private $attack;

    /**
     * Player defence rate
     *
     * @var int
     */
    private $defence;

    /**
     * Maximum amount of health
     *
     * @var int
     */
    private $maxHealth;

    /**
     * Constructor
     *
     * @param string $playerName
     * @param int    $attack
     * @param int    $defence
     * @param int    $maxHealth
     */
    public function __construct(string $playerName, int $attack, int $defence, int $maxHealth)
    {
        $this->playerName = $playerName;
        $this->attack     = $attack;
        $this->defence    = $defence;
        $this->maxHealth  = $maxHealth;
    }

    /**
     * Returns command name
     *
     * @return string
     */
    public function getCommandName(): string
    {
        return 'create_new_player';
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
     * Returns player attack rate
     *
     * @return int
     */
    public function getAttack(): int
    {
        return $this->attack;
    }

    /**
     * Returns player defence rate
     *
     * @return int
     */
    public function getDefence(): int
    {
        return $this->defence;
    }

    /**
     * Returns maximum amount of health
     *
     * @return int
     */
    public function getMaxHealth(): int
    {
        return $this->maxHealth;
    }
}
