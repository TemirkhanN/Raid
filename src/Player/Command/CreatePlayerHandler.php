<?php

declare(strict_types=1);

namespace Raid\Player\Command;

use Raid\Player\Model\Player;
use Raid\Player\ValueObject\PlayerPreset;
use Raid\Player\Service\CreatePlayerService;

/**
 * Player creation handler
 */
class CreatePlayerHandler
{
    /**
     * Player creation service
     *
     * @var CreatePlayerService
     */
    private $playerCreator;

    /**
     * Constructor
     *
     * @param CreatePlayerService $createPlayerService
     */
    public function __construct(CreatePlayerService $createPlayerService)
    {
        $this->playerCreator = $createPlayerService;
    }

    /**
     * Handler player creation command
     *
     * @param CreatePlayer $command
     *
     * @return Player
     */
    public function handle(CreatePlayer $command): Player
    {
        $preset = new PlayerPreset(
            $command->getPlayerName(),
            $command->getAttack(),
            $command->getDefence(),
            100
        );

        $player = $this->playerCreator->execute($preset);

        return $player;
    }
}
