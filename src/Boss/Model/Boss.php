<?php

declare(strict_types = 1);

namespace Raid\Boss\Model;

use Raid\Character\Model\CharacterTrait;
use Raid\Character\ValueObject\CharacterPreset;

/**
 * Boss
 */
class Boss implements BossInterface
{
    use CharacterTrait;

    /**
     * Constructor
     *
     * @param CharacterPreset $bossInfo
     */
    public function __construct(CharacterPreset $bossInfo)
    {
        $this->name          = $bossInfo->getName();
        $this->attack        = $bossInfo->getAttack();
        $this->defence       = $bossInfo->getDefence();
        $this->maxHealth     = $bossInfo->getMaxHealth();
        $this->currentHealth = $this->maxHealth;
    }
}
