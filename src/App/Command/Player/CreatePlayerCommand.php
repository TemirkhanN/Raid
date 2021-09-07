<?php

declare(strict_types=1);

namespace Raid\App\Command\Player;

use Raid\App\Command\AbstractCommand;
use Raid\App\Command\ConsoleColorFormatter;
use Raid\Player\Command\CreatePlayer;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Player creation command
 */
class CreatePlayerCommand extends AbstractCommand
{
    protected static $defaultName = 'create_player';

    /**
     * Command configuration
     *
     * @return void
     */
    protected function configure()
    {
        parent::configure();

        $this->addArgument('name', InputArgument::REQUIRED, 'Player name');
    }

    /**
     * Creates player
     *
     * @param InputInterface  $input
     * @param OutputInterface $output
     *
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $name = $input->getArgument('name');
        if ($name === '') {
            return -1;
        }

        // TODO it's a preset data for all beginners and should be stored somewhere in config
        // Some classes preset sounds reasonable
        $attack  = 10;
        $defence = 5;
        $health  = 100;

        $command = new CreatePlayer($name, $attack, $defence, $health);
        $this->handle($command);

        $output->writeln(sprintf('%s has entered the game', ConsoleColorFormatter::green($name)));
        $output->writeln(ConsoleColorFormatter::green('Stats'));
        $output->writeln(
            sprintf(
                '%s: %d/%d',
                ConsoleColorFormatter::blue('Health'),
                $health,
                $health
            )
        );
        $output->writeln(sprintf('%s: %d', ConsoleColorFormatter::blue('Attack'), $attack));
        $output->writeln(sprintf('%s: %d', ConsoleColorFormatter::blue('Defence'), $defence));

        return 0;
    }
}
