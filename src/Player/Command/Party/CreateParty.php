<?php

declare(strict_types=1);

namespace Raid\Player\Command\Party;

use League\Tactician\Plugins\NamedCommand\NamedCommand;

/**
 * Party creation command
 */
class CreateParty implements NamedCommand
{
    private $initiator;

    private $subject;

    public function __construct(string $initiator, string $subject)
    {
        $this->initiator = $initiator;
        $this->subject = $subject;
    }

    public function getCommandName()
    {
        return 'create_party';
    }

    /**
     * Returns player name who asked party creation
     *
     * @return string
     */
    public function getInitiator(): string
    {
        return $this->initiator;
    }

    /**
     * Returns player name with whom party shall be created
     *
     * @return string
     */
    public function getSubject(): string
    {
        return $this->subject;
    }
}
