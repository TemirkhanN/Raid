<?php

declare(strict_types=1);

namespace Raid\App\Command;

use League\Tactician\CommandBus;
use Raid\Player\Command\CreatePlayer;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Player creation command
 */
class CreatePlayerCommand extends Command
{
    /**
     * Command bus
     *
     * @var CommandBus
     */
    private $commandBus;

    /**
     * Constructor
     *
     * @param CommandBus $bus
     * @param string     $name
     */
    public function __construct(CommandBus $bus, string $name)
    {
        parent::__construct($name);

        $this->commandBus = $bus;
    }

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
        $this->commandBus->handle($command);

        $output->writeln(sprintf('%s has entered the game', ColoredCliFormatter::green($name)));
        $output->writeln(ColoredCliFormatter::green('Stats'));
        $output->writeln(
            sprintf(
                '%s: %d/%d',
                ColoredCliFormatter::blue('Health'),
                $health,
                $health
            )
        );
        $output->writeln(sprintf('%s: %d', ColoredCliFormatter::blue('Attack'), $attack));
        $output->writeln(sprintf('%s: %d', ColoredCliFormatter::blue('Defence'), $defence));

        return 0;
    }
}
