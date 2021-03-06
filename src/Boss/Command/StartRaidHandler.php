<?php

declare(strict_types=1);

namespace Raid\Boss\Command;

use Raid\Boss\Model\Raid;
use Raid\Boss\Repository\RaidRepositoryInterface;
use Raid\Boss\Service\SearchBossService;
use Raid\Player\Service\SearchPlayerService;
use Ramsey\Uuid\Uuid;

/**
 * Raid initiation handler
 */
class StartRaidHandler
{
    /**
     * Player searcher
     *
     * @var SearchPlayerService
     */
    private $playerSearcher;

    /**
     * Boss searcher
     *
     * @var SearchBossService
     */
    private $bossSearcher;

    /**
     * Raid repository
     *
     * @var RaidRepositoryInterface
     */
    private $raidRepository;

    /**
     * Constructor
     *
     * @param SearchPlayerService     $playerSearcher
     * @param SearchBossService       $bossSearcher
     * @param RaidRepositoryInterface $raidRepository
     */
    public function __construct(
        SearchPlayerService $playerSearcher,
        SearchBossService $bossSearcher,
        RaidRepositoryInterface $raidRepository
    ) {
        $this->playerSearcher = $playerSearcher;
        $this->bossSearcher   = $bossSearcher;
        $this->raidRepository = $raidRepository;
    }

    /**
     * Handles raid start
     *
     * @param StartRaid $command
     *
     * @return void
     */
    public function handle(StartRaid $command): void
    {
        $playerName = $command->getInitiator();
        if (!$initiator = $this->playerSearcher->execute($playerName)) {
            throw new \RuntimeException(sprintf('Player with name "%s" does not exist', $playerName));
        }

        if (!$party = $initiator->getParty()) {
            throw new \RuntimeException('Player without party can not initiate raid');
        }

        if ($party->isParticipatingInRaid()) {
            throw new \RuntimeException('Party is already participating in some raid');
        }

        $bossName = $command->getBoss();
        if (!$boss = $this->bossSearcher->execute($bossName)) {
            throw new \RuntimeException(sprintf('Unknown raid boss "%s"', $bossName));
        }

        $raidIdentifier = Uuid::uuid4()->toString();
        $raid           = new Raid($raidIdentifier, $boss, $party);
        $raid->start();

        $this->raidRepository->saveRaid($raid);
    }
}
