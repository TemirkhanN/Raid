<?php

declare(strict_types = 1);

namespace Raid\Character\Model;

/**
 * Character trait
 */
trait CharacterTrait
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
}
