<?php

declare(strict_types=1);

namespace Raid\Player\Service;

use Raid\Player\Model\Player;
use Raid\Player\Repository\PlayerRepositoryInterface;

/**
 * Player searching service
 */
class SearchPlayerService
{
    /**
     * Player repository
     *
     * @var PlayerRepositoryInterface
     */
    private $playerRepository;

    /**
     * Constructor
     *
     * @param PlayerRepositoryInterface $playerRepository
     */
    public function __construct(PlayerRepositoryInterface $playerRepository)
    {
        $this->playerRepository = $playerRepository;
    }

    /**
     * Finds player by name
     *
     * @param string $playerName
     *
     * @return Player|null
     */
    public function execute(string $playerName): ?Player
    {
        return $this->playerRepository->findPlayerByName($playerName);
    }
}
