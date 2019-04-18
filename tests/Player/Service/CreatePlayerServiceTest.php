<?php

declare(strict_types=1);

namespace Raid\Player\Service;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Raid\Player\Model\Player;
use Raid\Player\Repository\PlayerRepositoryInterface;
use Raid\Player\ValueObject\PlayerPreset;

/**
 * Tests player creation
 */
class CreatePlayerServiceTest extends TestCase
{
    /**
     * Player repository
     *
     * @var MockObject|PlayerRepositoryInterface
     */
    private $playerRepository;

    /**
     * Player creator
     *
     * @var CreatePlayerService
     */
    private $createPlayerService;

    /**
     * Environment preset
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->playerRepository = $this->createMock(PlayerRepositoryInterface::class);
        $this->createPlayerService = new CreatePlayerService($this->playerRepository);
    }

    /**
     * Environment unset
     *
     * @return void
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        $this->playerRepository = null;
        $this->createPlayerService = null;
    }

    /**
     * Tests player creation
     *
     * @return void
     */
    public function testCreatePlayer(): void
    {
        $this->playerRepository
            ->expects($this->once())
            ->method('savePlayer')
            ->with(
                $this->callback(function (Player $player): bool {
                    $this->assertEquals('Tul', $player->getName());
                    $this->assertEquals(123, $player->getAttack());
                    $this->assertEquals(321, $player->getDefence());
                    $this->assertEquals(1000, $player->getMaxHealth());
                    $this->assertEquals(1000, $player->getCurrentHealth());

                    return true;
                })
            );

        $playerPreset = new PlayerPreset('Tul', 123, 321, 1000);

        $player = $this->createPlayerService->execute($playerPreset);

        $this->assertEquals('Tul', $player->getName());
        $this->assertEquals(123, $player->getAttack());
        $this->assertEquals(321, $player->getDefence());
        $this->assertEquals(1000, $player->getMaxHealth());
        $this->assertEquals(1000, $player->getCurrentHealth());
    }
}
