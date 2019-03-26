<?php

declare(strict_types=1);

namespace Raid\Player\DTO;

class PlayerPreset
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
