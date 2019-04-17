<?php

declare(strict_types=1);

namespace Raid\App\Command;

use League\Tactician\CommandBus;
use Raid\Player\Command\Party\CreateParty;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreatePartyCommand extends Command
{
    private $commandBus;

    public function __construct(CommandBus $bus, string $name)
    {
        parent::__construct($name);

        $this->commandBus = $bus;
    }

    protected function configure()
    {
        parent::configure();

        $this->addArgument('inviter', InputArgument::REQUIRED, 'Player name');
        $this->addArgument('invited', InputArgument::REQUIRED, 'Player name');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $inviterPlayerName = $input->getArgument('inviter');
        $invitedPlayerName = $input->getArgument('invited');
        if ($inviterPlayerName === '' || $invitedPlayerName) {
            return -1;
        }

        $command = new CreateParty($inviterPlayerName, $invitedPlayerName);

        $this->commandBus->handle($command);

        $output->writeln(
            sprintf(
                '"%s" has created party with "%s" the game',
                ColoredCliFormatter::green($inviterPlayerName),
                ColoredCliFormatter::green($invitedPlayerName)
            )
        );

        return 0;
    }
}
