<?php

declare(strict_types=1);

namespace Raid\Boss\Repository;

use Raid\Boss\Model\Raid;
use Raid\Player\Model\Party\Party;

/**
 * Raid repository interface
 */
interface RaidRepositoryInterface
{
    public function findRaid(Party $party): ?Raid;
    /**
     * Saves raid into repository
     *
     * @param Raid $raid
     *
     * @return void
     */
    public function saveRaid(Raid $raid): void;
}
