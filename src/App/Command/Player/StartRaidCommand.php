<?php

declare(strict_types = 1);

namespace Raid\App\Command\Player;

use Raid\App\Command\AbstractCommand;
use Raid\App\Command\ConsoleColorFormatter;
use Raid\Boss\Command\StartRaid;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Raid starting command
 */
class StartRaidCommand extends AbstractCommand
{
    protected static $defaultName = 'start_raid';

    /**
     * Command configuration
     *
     * @return void
     */
    protected function configure()
    {
        parent::configure();

        $this->addArgument('partyLeader', InputArgument::REQUIRED, 'Party leader name');
        $this->addArgument('boss', InputArgument::REQUIRED, 'Boss name');
    }

    /**
     * Create raid for party
     *
     * @param InputInterface  $input
     * @param OutputInterface $output
     *
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $raidInitiator = $input->getArgument('partyLeader');
        $bossName      = $input->getArgument('boss');
        if ($raidInitiator === '' || $bossName === '') {
            return -1;
        }

        $command = new StartRaid($raidInitiator, $bossName);
        $this->handle($command);

        $output->writeln(
            sprintf(
                'Player %s has started raid with %s',
                ConsoleColorFormatter::green($raidInitiator),
                ConsoleColorFormatter::blue($bossName)
            )
        );

        return 0;
    }
}
