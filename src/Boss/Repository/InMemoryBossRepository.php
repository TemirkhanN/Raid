<?php

declare(strict_types=1);

namespace Raid\Boss\Repository;

use Raid\Boss\Model\Boss;
use Raid\Character\ValueObject\CharacterPreset;

/**
 * Boss repository
 */
class InMemoryBossRepository implements BossRepositoryInterface
{
    /**
     * Boss list
     *
     * @var \SplObjectStorage|Boss[]
     */
    private $bosses;

    /**
     * Constructor
     *
     * @param CharacterPreset[] $bosses
     */
    public function __construct(array $bosses)
    {
        $this->bosses = new \SplObjectStorage();
        foreach ($bosses as $bossPreset) {
            $boss = new Boss($bossPreset);
            $this->saveBoss($boss);
        }
    }

    /**
     * Saves boss into repository
     *
     * @param Boss $boss
     *
     * @return void
     *
     * @throws \RuntimeException
     */
    public function saveBoss(Boss $boss): void
    {
        if ($this->bosses->contains($boss)) {
            return;
        }

        if ($this->findBossByName($boss->getName())) {
            throw new \RuntimeException(sprintf('Boss with name "%s" already exists', $boss->getName()));
        }

        $this->bosses->attach($boss);
    }

    /**
     * Finds boss by name
     *
     * @param string $bossName
     *
     * @return Boss|null
     */
    public function findBossByName(string $bossName): ?Boss
    {
        foreach ($this->bosses as $boss) {
            if ($boss->getName() === $bossName) {
                return $boss;
            }
        }

        return null;
    }
}
