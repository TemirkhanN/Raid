<?php

declare(strict_types = 1);

namespace Raid\App\Command;

use League\Tactician\CommandBus;
use Symfony\Component\Console\Command\Command;

/**
 * Abstract command
 */
abstract class AbstractCommand extends Command
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
    public function __construct(CommandBus $bus)
    {
        parent::__construct();

        $this->commandBus = $bus;
    }

    protected function handle(object $command)
    {
        return $this->commandBus->handle($command);
    }
}
