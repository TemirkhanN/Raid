<?php

declare(strict_types=1);

namespace Raid\Character\ValueObject;

/**
 * New character dataset
 */
class CharacterPreset
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
     * Maximum amount of health
     *
     * @var int
     */
    private $maxHealth;

    /**
     * Constructor
     *
     * @param string $name
     * @param int    $attack
     * @param int    $defence
     * @param int    $maxHealth
     */
    public function __construct(string $name, int $attack, int $defence, int $maxHealth)
    {
        $this->name      = $name;
        $this->attack    = $attack;
        $this->defence   = $defence;
        $this->maxHealth = $maxHealth;
    }

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
     * Returns max health
     *
     * @return int
     */
    public function getMaxHealth(): int
    {
        return $this->maxHealth;
    }
}
