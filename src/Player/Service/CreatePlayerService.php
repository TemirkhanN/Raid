<?php

declare(strict_types=1);

namespace Raid\Player\Service;

use Raid\Player\Repository\PlayerRepositoryInterface;
use Raid\Player\ValueObject\PlayerPreset;
use Raid\Player\Model\Player;

/**
 * Player creation service
 */
class CreatePlayerService
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
     * Creates player
     *
     * @param PlayerPreset $playerPreset
     *
     * @return Player
     */
    public function execute(PlayerPreset $playerPreset): Player
    {
        $player = new Player($playerPreset);

        $this->playerRepository->savePlayer($player);

        return $player;
    }
}
