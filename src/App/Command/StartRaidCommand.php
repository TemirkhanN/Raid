<?php

declare(strict_types = 1);

namespace Raid\App\Command;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Raid starting command
 */
class StartRaidCommand extends \Raid\App\Command\AbstractCommand
{
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
        $this->getCommandBus()->handle($command);

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