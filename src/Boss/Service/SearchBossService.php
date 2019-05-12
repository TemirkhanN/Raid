<?php

declare(strict_types=1);

namespace Raid\Boss\Service;

use Raid\Boss\Model\Boss;
use Raid\Boss\Model\BossInterface;
use Raid\Boss\Repository\BossRepositoryInterface;

/**
 * Boss searching service
 */
class SearchBossService
{
    /**
     * Boss repository
     *
     * @var BossRepositoryInterface
     */
    private $bossRepository;

    /**
     * Constructor
     *
     * @param BossRepositoryInterface $bossRepository
     */
    public function __construct(BossRepositoryInterface $bossRepository)
    {
        $this->bossRepository = $bossRepository;
    }

    /**
     * Finds boss by name
     *
     * @param string $bossName
     *
     * @return BossInterface|null
     */
    public function execute(string $bossName): ?Boss
    {
        return $this->bossRepository->findBossByName($bossName);
    }
}
