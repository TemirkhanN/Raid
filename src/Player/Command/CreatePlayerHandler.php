<?php

declare(strict_types=1);

namespace Raid\Player\Command;

use Raid\Player\ValueObject\PlayerPreset;
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
            $command->getDefence(),
            100
        );

        $player = $this->playerCreator->execute($preset);

        return $player;
    }
}
