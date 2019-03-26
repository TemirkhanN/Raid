<?php

declare(strict_types=1);

namespace Raid\Player\Command;

use League\Tactician\Plugins\NamedCommand\NamedCommand;

class CreatePlayer implements NamedCommand
{
    private $name;

    private $attack;

    private $defence;

    public function __construct(string $name, int $attack, int $defence)
    {
        $this->name = $name;
        $this->attack = $attack;
        $this->defence = $defence;
    }

    public function getCommandName()
    {
        return 'create_new_player';
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getAttack(): int
    {
        return $this->attack;
    }

    /**
     * @return int
     */
    public function getDefence(): int
    {
        return $this->defence;
    }
}
