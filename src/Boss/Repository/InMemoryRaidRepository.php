<?php

declare(strict_types=1);

namespace Raid\Boss\Repository;

use Raid\Boss\Model\Raid;
use Raid\Player\Model\Party\Party;
use SplObjectStorage;

/**
 * In-memory raid repository
 */
class InMemoryRaidRepository implements RaidRepositoryInterface
{
    /**
     * Raid list
     *
     * @var SplObjectStorage|Raid[]
     */
    private $raids;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->raids = new SplObjectStorage();
    }

    public function findRaid(Party $party): ?Raid
    {
        $raidId = $party->getRaidId();
        if ($raidId === null) {
            return null;
        }

        foreach ($this->raids as $raid) {
            // TODO law of demeter
            if ($raid->getParty()->getRaidId() === $raidId) {
                return $raid;
            }
        }

        return null;
    }

    /**
     * Saves raid into repository
     *
     * @param Raid $raid
     *
     * @return void
     *
     * @throws \RuntimeException
     */
    public function saveRaid(Raid $raid): void
    {
        if ($this->raids->contains($raid)) {
            return;
        }

        $this->raids->attach($raid);
    }
}
