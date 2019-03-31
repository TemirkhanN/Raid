<?php

declare(strict_types=1);

namespace Raid\Player\Service;

use PHPUnit\Framework\TestCase;
use Raid\Player\ValueObject\PlayerPreset;

/**
 * Tests player creation
 */
class CreatePlayerServiceTest extends TestCase
{
    /**
     * Tests player creation
     *
     * @return void
     */
    public function testCreatePlayer(): void
    {
        $playerPreset = new PlayerPreset('Tul', 123, 321, 1000);

        $service = new CreatePlayerService();
        $player = $service->execute($playerPreset);

        $this->assertEquals('Tul', $player->getName());
        $this->assertEquals(123, $player->getAttack());
        $this->assertEquals(321, $player->getDefence());
        $this->assertEquals(1000, $player->getMaxHealth());
        $this->assertEquals(1000, $player->getCurrentHealth());
    }
}
