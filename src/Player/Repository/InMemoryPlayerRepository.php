<?php

declare(strict_types = 1);

namespace Raid\Player\Repository;

use Raid\Player\Model\Player;

class InMemoryPlayerRepository implements PlayerRepositoryInterface
{
    private $players;

    public function __construct()
    {
        $this->players = new \SplObjectStorage();
    }

    public function savePlayer(Player $player): void
    {
        if ($this->players->contains($player)) {
            return;
        }

        $this->players->attach($player);
    }
}