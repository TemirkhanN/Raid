<?php

declare(strict_types=1);

namespace Raid\Player\Service;

use Raid\Player\DTO\PlayerPreset;
use Raid\Player\Model\Player;

class CreatePlayerService
{
    public function execute(PlayerPreset $playerPreset): Player
    {
        $player = new Player($playerPreset);

        return $player;
    }
}
