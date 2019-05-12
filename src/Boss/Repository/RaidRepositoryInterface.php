<?php

declare(strict_types=1);

namespace Raid\Boss\Repository;

use Raid\Boss\Model\Raid;

/**
 * Raid repository interface
 */
interface RaidRepositoryInterface
{
    /**
     * Saves raid into repository
     *
     * @param Raid $raid
     *
     * @return void
     */
    public function saveRaid(Raid $raid): void;
}
