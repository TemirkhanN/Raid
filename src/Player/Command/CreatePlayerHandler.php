<?php

declare(strict_types=1);

namespace Raid\Player\Command;

use Raid\Player\Model\Player;
use Raid\Player\Repository\PlayerRepositoryInterface;
use Raid\Character\ValueObject\CharacterPreset;

/**
 * Player creation handler
 */
class CreatePlayerHandler
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
     * Handler player creation command
     *
     * @param CreatePlayer $command
     *
     * @return void
     */
    public function handle(CreatePlayer $command)
    {
        $preset = new CharacterPreset(
            $command->getPlayerName(),
            $command->getAttack(),
            $command->getDefence(),
            $command->getMaxHealth()
        );

        $player = new Player($preset);

        $this->playerRepository->savePlayer($player);
    }
}
