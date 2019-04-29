<?php

declare(strict_types=1);

namespace Raid\App\Command\Player;

use Raid\App\Command\AbstractCommand;
use Raid\App\Command\ConsoleColorFormatter;
use Raid\Player\Command\Party\CreateParty;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Party creation command
 */
class CreatePartyCommand extends AbstractCommand
{
    /**
     * Configures command
     *
     * @return void
     */
    protected function configure()
    {
        parent::configure();

        $this->addArgument('inviter', InputArgument::REQUIRED, 'Player name');
        $this->addArgument('invited', InputArgument::REQUIRED, 'Player name');
    }

    /**
     * Creates party between players
     *
     * @param InputInterface  $input
     * @param OutputInterface $output
     *
     * @return int|null
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $inviterPlayerName = $input->getArgument('inviter');
        $invitedPlayerName = $input->getArgument('invited');
        if ($inviterPlayerName === '' || $invitedPlayerName === '') {
            return -1;
        }

        $command = new CreateParty($inviterPlayerName, $invitedPlayerName);

        $this->getCommandBus()->handle($command);

        $output->writeln(
            sprintf(
                '"%s" has created party with "%s" the game',
                ConsoleColorFormatter::green($inviterPlayerName),
                ConsoleColorFormatter::green($invitedPlayerName)
            )
        );

        return 0;
    }
}
