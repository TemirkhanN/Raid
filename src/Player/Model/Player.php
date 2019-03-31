<?php

declare(strict_types=1);

namespace Raid\Player\Model;

use Raid\Player\ValueObject\PlayerPreset;

/**
 * Player
 */
class Player
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
     * Constructor
     *
     * @param PlayerPreset $playerPreset
     */
    public function __construct(PlayerPreset $playerPreset)
    {
        $this->name          = $playerPreset->getName();
        $this->attack        = $playerPreset->getAttack();
        $this->defence       = $playerPreset->getDefence();
        $this->maxHealth     = $playerPreset->getMaxHealth();
        $this->currentHealth = $this->maxHealth;
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
