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
    public function __construct(CommandBus $bus, string $name)
    {
        parent::__construct($name);

        $this->commandBus = $bus;
    }

    /**
     * Returns command bus
     *
     * @return CommandBus
     */
    protected function getCommandBus(): CommandBus
    {
        return $this->commandBus;
    }
}