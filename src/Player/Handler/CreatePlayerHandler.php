<?php

declare(strict_types=1);

namespace Raid\Player\Handler;

use Raid\Player\Command\CreatePlayer;
use Raid\Player\DTO\PlayerPreset;
use Raid\Player\Service\CreatePlayerService;

class CreatePlayerHandler
{
    /**
     * @var CreatePlayerService
     */
    private $playerCreator;

    public function __construct(CreatePlayerService $createPlayerService)
    {
        $this->playerCreator = $createPlayerService;
    }

    public function handle(CreatePlayer $command)
    {
        $preset = new PlayerPreset(
            $command->getName(),
            $command->getAttack(),
            $command->getDefence()
        );

        $player = $this->playerCreator->execute($preset);

        return $player;
    }
}
