<?php

declare(strict_types=1);

namespace Raid\Player\ValueObject;

class PlayerPreset
{
    private $name;

    private $attack;

    private $defence;

    private $maxHealth;

    public function __construct(string $name, int $attack, int $defence, int $maxHealth)
    {
        $this->name = $name;
        $this->attack = $attack;
        $this->defence = $defence;
        $this->maxHealth = $maxHealth;
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

    /**
     * @return int
     */
    public function getMaxHealth(): int
    {
        return $this->maxHealth;
    }
}
