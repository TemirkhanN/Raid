<?php

declare(strict_types = 1);

namespace Raid\Player\Repository;

use Raid\Player\Model\Player;

/**
 * Player repository interface
 */
interface PlayerRepositoryInterface
{
    /**
     * Saves player into repository
     *
     * @param Player $player
     *
     * @return void
     */
    public function savePlayer(Player $player): void;

    /**
     * Finds player by name
     *
     * @param string $playerName
     *
     * @return Player|null
     */
    public function findPlayerByName(string $playerName): ?Player;
}
