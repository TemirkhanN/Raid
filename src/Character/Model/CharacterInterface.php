<?php

declare(strict_types = 1);

namespace Raid\Character\Model;

/**
 * Character interface
 */
interface CharacterInterface
{
    /**
     * Returns name
     *
     * @return string
     */
    public function getName(): string;

    /**
     * Returns attack rate
     *
     * @return int
     */
    public function getAttack(): int;

    /**
     * Returns defence rate
     *
     * @return int
     */
    public function getDefence(): int;

    /**
     * Returns current health amount
     *
     * @return int
     */
    public function getCurrentHealth(): int;

    /**
     * Returns max health amount
     *
     * @return int
     */
    public function getMaxHealth(): int;
}
