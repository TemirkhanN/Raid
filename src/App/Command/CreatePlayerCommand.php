<?php

declare(strict_types=1);

namespace Raid\App\Command;

use League\Tactician\CommandBus;
use Raid\Player\Command\CreatePlayer;
use Raid\Player\Model\Player;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreatePlayerCommand extends Command
{
    private $commandBus;

    public function __construct(CommandBus $bus, ?string $name = null)
    {
        parent::__construct($name);

        $this->commandBus = $bus;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $name = 'Bilbo';
        $attack = 1;
        $defence = 0;

        $command = new CreatePlayer($name, $attack, $defence);

        /**
         * @var Player $player
         */
        $player = $this->commandBus->handle($command);

        $output->writeln(sprintf('Player %s has entered the game', $player->getName()));
    }
}
