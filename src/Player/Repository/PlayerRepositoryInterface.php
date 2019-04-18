<?php

declare(strict_types = 1);

namespace Raid\Player\Repository;

use Raid\Player\Model\Player;

interface PlayerRepositoryInterface
{
    public function savePlayer(Player $player): void;

    public function findPlayerByName(string $playerName): ?Player;
}