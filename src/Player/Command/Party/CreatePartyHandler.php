<?php

declare(strict_types=1);

namespace Raid\Player\Command\Party;

use Raid\Player\Service\SearchPlayerService;

/**
 * Party creation handler
 */
class CreatePartyHandler
{
    /**
     * Player search service
     *
     * @var SearchPlayerService
     */
    private $playerSearcher;

    /**
     * Constructor
     *
     * @param SearchPlayerService $playerSearcher
     */
    public function __construct(SearchPlayerService $playerSearcher)
    {
        $this->playerSearcher = $playerSearcher;
    }

    /**
     * Handle party creation
     *
     * @param CreateParty $command
     *
     * @return void
     */
    public function handle(CreateParty $command): void
    {
        if (!$inviter = $this->playerSearcher->execute($command->getInitiator())) {
            throw new \RuntimeException('Player with such name does not exist');
        }

        if (!$subject = $this->playerSearcher->execute($command->getSubject())) {
            throw new \RuntimeException('Player with such name does not exist');
        }

        $invitation = $inviter->inviteToParty($subject);

        // TODO another player should accept by separate command but MVP has no time for prelude
        $subject->acceptPartyInvitation($invitation);
    }
}
