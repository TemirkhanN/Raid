<?php

declare(strict_types = 1);

namespace Raid\Player\Command\Combat;

use Raid\AbstractCommandHandleTest;
use Raid\Player\Command\Exception\InvalidArgumentException;

/**
 * Tests player attacking behavior
 */
class AttackCommandHandlerTest extends AbstractCommandHandleTest
{
    /**
     * Tests command name
     *
     * @return void
     */
    public function testGetCommandName(): void
    {
        $command = new AttackCommand('SomePlayerName');

        $this->assertEquals('attack_boss', $command->getCommandName());
    }

    /**
     * Tests trying to make attack without existing player
     *
     * @return void
     */
    public function testAttackWhenThereIsNoSuchPlayer(): void
    {
        $this->markTestSkipped('Code is not implemented yet');
        $command = new AttackCommand('SomePlayerName');

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionCode(InvalidArgumentException::CODE_UNKNOWN_PLAYER);

        $this->runCommand($command);
    }
}
