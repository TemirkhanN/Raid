<?php

declare(strict_types = 1);

namespace Raid\Boss\Command;

use Raid\Boss\Model\Raid;
use Raid\Player\Service\SearchPlayerService;

/**
 * Raid initiation handler
 */
class StartRaidHandler
{
    /**
     * Player searcher
     *
     * @var SearchPlayerService
     */
    private $playerSearcher;

    public function __construct(SearchPlayerService $playerSearcher)
    {
        $this->playerSearcher = $playerSearcher;
    }

    public function handle(StartRaid $command): void
    {
        $playerName = $command->getInitiator();
        if (!$initiator = $this->playerSearcher->execute($playerName)) {
            throw new \RuntimeException('Player with such name does not exist');
        }

        $raid = new Raid($initiator, $boss);
    }
}
