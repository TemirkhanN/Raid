<?php

declare(strict_types = 1);

namespace Raid\Player\Repository;

use Raid\Player\Model\Player;

/**
 * In-memory player repository
 */
class InMemoryPlayerRepository implements PlayerRepositoryInterface
{
    /**
     * Player list
     *
     * @var \SplObjectStorage|Player[]
     */
    private $players;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->players = new \SplObjectStorage();
    }

    /**
     * Saves player into repository
     *
     * @param Player $player
     *
     * @return void
     *
     * @throws \RuntimeException
     */
    public function savePlayer(Player $player): void
    {
        if ($this->players->contains($player)) {
            return;
        }

        if ($this->findPlayerByName($player->getName())) {
            throw new \RuntimeException(sprintf('Player with name "%s" already exists', $player->getName()));
        }

        $this->players->attach($player);
    }

    /**
     * Finds player by name
     *
     * @param string $playerName
     *
     * @return Player|null
     */
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
