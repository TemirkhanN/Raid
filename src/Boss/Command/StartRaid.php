<?php

declare(strict_types = 1);

namespace Raid\Boss\Command;

use League\Tactician\Plugins\NamedCommand\NamedCommand;

/**
 * Raid initiating command
 */
class StartRaid implements NamedCommand
{
    /**
     * Initiator name
     *
     * @var string
     */
    private $initiator;

    /**
     * Boss name
     *
     * @var string
     */
    private $boss;

    /**
     * Constructor
     *
     * @param string $initiator
     * @param string $bossName
     */
    public function __construct(string $initiator, string $bossName)
    {
        $this->initiator = $initiator;
        $this->boss      = $bossName;
    }

    /**
     * Returns command name
     *
     * @return string
     */
    public function getCommandName()
    {
        return 'start_raid';
    }

    /**
     * Returns initiator
     *
     * @return string
     */
    public function getInitiator(): string
    {
        return $this->initiator;
    }

    /**
     * Returns boss
     *
     * @return string
     */
    public function getBoss(): string
    {
        return $this->boss;
    }
}
