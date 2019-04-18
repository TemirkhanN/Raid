<?php

declare(strict_types = 1);

namespace Raid\Player\Repository;

use Raid\Player\Model\Player;

class InMemoryPlayerRepository implements PlayerRepositoryInterface
{
    /**
     * @var \SplObjectStorage|Player[]
     */
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

        if ($this->findPlayerByName($player->getName())) {
            throw new \RuntimeException(sprintf('Player with name "%" already exists', $player->getName()));
        }

        $this->players->attach($player);
    }

    public function findPlayerByName(string $playerName): ?Player
    {
        foreach ($this->players as $player) {
            if ($player->getName() === $playerName) {
                return $player;
            }
        }

        return null;
    }
}