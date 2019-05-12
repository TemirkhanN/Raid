<?php

declare(strict_types = 1);

namespace Raid\Boss\Repository;

use Raid\Boss\Model\Boss;

/**
 * Boss repository interface
 */
interface BossRepositoryInterface
{
    /**
     * Finds boss by name
     *
     * @param string $bossName
     *
     * @return Boss|null
     */
    public function findBossByName(string $bossName): ?Boss;
}
