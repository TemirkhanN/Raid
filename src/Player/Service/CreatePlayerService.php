<?php

declare(strict_types=1);

namespace Raid\Player\Service;

use Raid\Player\ValueObject\PlayerPreset;
use Raid\Player\Model\Player;

/**
 * Player creation service
 */
class CreatePlayerService
{
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

        return $player;
    }
}
